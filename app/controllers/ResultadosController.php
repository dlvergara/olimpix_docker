<?php

namespace app\controllers;

use app\models\PruebaSalto;
use yii\web\NotFoundHttpException;

class ResultadosController extends \yii\web\Controller
{
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
     * @param int $prueba
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex($prueba = 0)
    {
        $pruebaModel = PruebaSalto::find()->where(['id_prueba' => $prueba])->one();

        if (empty($pruebaModel)) {
            throw new NotFoundHttpException('La prueba solicitada no fue encontrada.');
        }
        $resultados = $pruebaModel->resultadoSaltos;

        return $this->render('index', ['prueba' => $pruebaModel, 'resultados' => $resultados]);
    }

}
