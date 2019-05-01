<?php

namespace app\controllers;

use app\models\BuyerInfoForm;
use app\models\Evento;
use app\models\LoginForm;
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
        $view = 'reservar-servicios';
        $eventoModel = $this->findModel($evento);
        $cargosAdicionales = $this->getCargosAdicionales();
        if (Yii::$app->request->isPost && $this->validarReserva()) {
            $view = 'pagar-servicios';
            $formModels = $this->validModels;
        } else {
            $formModels = $this->models;
        }

        return $this->render($view, ['buyerInfo' => $buyerInfo,'model' => $eventoModel, 'formModels' => $formModels, 'cargosAdicionales' => $cargosAdicionales]);
    }

    public function actionPagar($evento)
    {
        echo '<pre>'; var_dump(Yii::$app->request->post()); exit;

        return $this->render('pago');
    }

    /**
     * @return array
     */
    private function getCargosAdicionales()
    {
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
}
