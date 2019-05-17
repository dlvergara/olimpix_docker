<?php

namespace app\controllers;

use app\models\OrderDetail;
use Yii;
use app\models\ServicioContratado;
use app\models\ServicioContratadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServicioContratadoController implements the CRUD actions for ServicioContratado model.
 */
class ServicioContratadoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ServicioContratado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicioContratadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServicioContratado model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ServicioContratado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionCreate($evento, $orderDetailId)
    {
        $orderDetail = $this->findOrderDetailModel($orderDetailId);
        $result = false;
        $model = new ServicioContratado();
        $model->evento_id_evento = $evento;
        $model->id_estado_servicio = 1;
        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            if(!empty($post[$model->formName()]['id_servicio_contratado'])) {
                $model->id_servicio_contratado = $post[$model->formName()]['id_servicio_contratado'];
                $model = $this->findModel($model->id_servicio_contratado);
                $model->load(Yii::$app->request->post());
            }
            if($model->save()) {
                if (Yii::$app->request->isAjax) {
                    $result = true;
                }
            }
        }

        return $this->renderPartial('prueba', [
                'result' => $result,
                'model' => $model,
                'servicioDisponible' => $orderDetail->servicioDisponibleIdServicioDisponible,
                'eventoModel' => $model->eventoIdEvento,
                'orderDetail' => $orderDetail,
            ]
        );

        return $this->asJson([
            'result' => $result,
            'model' => $model,
            'evento' => $evento,
        ]);
    }

    /**
     * Updates an existing ServicioContratado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_servicio_contratado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ServicioContratado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ServicioContratado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ServicioContratado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServicioContratado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param $id
     * @return OrderDetail|null
     * @throws NotFoundHttpException
     */
    protected function findOrderDetailModel($id)
    {
        if (($model = OrderDetail::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
