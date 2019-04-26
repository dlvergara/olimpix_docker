<?php

namespace app\controllers;

use app\models\Evento;
use app\models\ReservaForm;
use yii\web\NotFoundHttpException;

class EventoController extends \yii\web\Controller
{
    public function actionIndex($evento)
    {
        $formModel = new ReservaForm();

        $model = $this->findModel($evento);
        return $this->render('index', ['model' => $model, 'formModel' => $formModel]);
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
