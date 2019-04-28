<?php

namespace app\controllers;

use app\models\Evento;
use app\models\LoginForm;
use app\models\ReservaForm;
use Yii;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;

class EventoController extends \yii\web\Controller
{
    protected $models;
    protected $validModels;

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
        $eventoModel = $this->findModel($evento);
        if (Yii::$app->request->post() && $this->validarReserva()) {
            $sumaMonto = 0;
            /* @var $validModel ReservaForm */
            foreach ($this->validModels as $index => $validModel) {
                $sumaMonto += $validModel->getServicioDisponible()->monto * $validModel->cantidad;
            }
        }
        return $this->render('reservar-servicios', ['model' => $eventoModel, 'formModels' => $this->models, 'subtotal' => $sumaMonto]);
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
