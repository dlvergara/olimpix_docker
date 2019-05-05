<?php

namespace app\controllers;

use app\models\BuyerInfoForm;
use app\models\CargoAdicional;
use app\models\Evento;
use app\models\LoginForm;
use app\models\Order;
use app\models\OrderModel;
use app\models\ReservaForm;
use app\models\ReservaJineteForm;
use Yii;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;

class EventoController extends \yii\web\Controller
{
    protected $models;
    protected $validModels;

    /**
     * @param $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        if (in_array($action->id, ['confirmacion'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    /**
     * @param $evento
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex($evento)
    {
        $model = $this->findModel($evento);
        return $this->render('index', ['model' => $model,]);
    }

    /*
     * Action reservar
     */
    public function actionReservar($evento)
    {
        $buyerInfo = new BuyerInfoForm();
        $buyerInfo->setPorcentajeIva(19);

        $view = 'reservar-servicios';
        $eventoModel = $this->findModel($evento);
        $cargosAdicionales = $this->getCargosAdicionales(0);
        $total = 0;
        $totalIva = 0;
        $baseIva = 0;

        if (Yii::$app->request->isPost && $this->validarReserva()) {
            $view = 'pagar-servicios';
            $formModels = $this->validModels;

            $cargosAdicionales = $this->getCargosAdicionales($total);

            $orden = $buyerInfo->createOrder($formModels, $cargosAdicionales, "COP", $total, $baseIva);
            $totalIva = $buyerInfo->getTotalIva($baseIva);

        } else {
            $formModels = $this->models;
        }

        return $this->render($view, ['buyerInfo' => $buyerInfo, 'orden' => $orden, 'model' => $eventoModel, 'formModels' => $formModels, 'cargosAdicionales' => $cargosAdicionales, 'baseIva' => $baseIva, 'totalIva' => $totalIva]);
    }

    /**
     *
     */
    public function actionConfirmacion($evento = null, $orden = null)
    {
        $orden = $this->findOrderModel($orden);
        $evento = $this->findModel($evento);

        $ordenModel = new OrderModel();
        $ordenModel->loadFromParentObj($orden);

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $ordenModel->processPostData($post);
        }

        return $this->render('confirmacion-' . $ordenModel->order_status_id_order_status, ['eventoModel' => $evento, 'ordenModel' => $orden]);
    }

    /**
     * @return array
     */
    private function getCargosAdicionales($total = 0)
    {
        //comision OLIMPIX
        $comisionOlimpix = new CargoAdicional();
        $comisionOlimpix->monto = 1000;
        $comisionOlimpix->concepto = "Comision Olimpix";

        //comision Pasarela de pago
        //2.99 + 900 + iva
        $comisionPasarela = new CargoAdicional();
        $comisionPasarela->monto = (($total * 2.99) / 100) + 900;
        $comisionPasarela->concepto = "Comision Pasarela de pagos";
        $comisionPasarela->iva = ($comisionPasarela->monto * 19) / 100;

        $comisionPasarela = new CargoAdicional();
        $comisionPasarela->monto = (($total * 19) / 100);
        $comisionPasarela->concepto = "Iva";

        return [];
    }

    /**
     *
     */
    private function validarReserva()
    {
        $this->models = [];
        $postData = Yii::$app->request->post();

        foreach ($postData['ReservaForm'] as $index => $postDatum) {
            $formModel = new ReservaForm();
            $formModel->cantidad = $postDatum['cantidad'];
            $formModel->servicio = isset($postDatum['servicio']) ? $postDatum['servicio'] : null;
            $this->models[$formModel->servicio] = $formModel;
        }

        /* @var $model ReservaForm */
        foreach ($this->models as $index => $model) {
            if (!empty($index)) {
                if ($model->validate() && $model->getServicioModel()) {
                    $this->validModels[] = $model;
                }
            }
        }
        return !empty($this->validModels);
    }

    /**
     * Finds the Evento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Evento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Evento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param $id
     * @return Order
     * @throws NotFoundHttpException
     */
    protected function findOrderModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
