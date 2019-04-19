<?php

namespace app\modules\backoffice\controllers;

use Yii;
use app\models\OrderHasPaymentMethod;
use app\models\OrderHasPaymentMethodSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderHasPaymentMethodController implements the CRUD actions for OrderHasPaymentMethod model.
 */
class OrderHasPaymentMethodController extends Controller
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
     * Lists all OrderHasPaymentMethod models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderHasPaymentMethodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderHasPaymentMethod model.
     * @param integer $order_id_order
     * @param integer $payment_method_id_payment_method
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($order_id_order, $payment_method_id_payment_method)
    {
        return $this->render('view', [
            'model' => $this->findModel($order_id_order, $payment_method_id_payment_method),
        ]);
    }

    /**
     * Creates a new OrderHasPaymentMethod model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrderHasPaymentMethod();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'order_id_order' => $model->order_id_order, 'payment_method_id_payment_method' => $model->payment_method_id_payment_method]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrderHasPaymentMethod model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $order_id_order
     * @param integer $payment_method_id_payment_method
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($order_id_order, $payment_method_id_payment_method)
    {
        $model = $this->findModel($order_id_order, $payment_method_id_payment_method);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'order_id_order' => $model->order_id_order, 'payment_method_id_payment_method' => $model->payment_method_id_payment_method]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OrderHasPaymentMethod model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $order_id_order
     * @param integer $payment_method_id_payment_method
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($order_id_order, $payment_method_id_payment_method)
    {
        $this->findModel($order_id_order, $payment_method_id_payment_method)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderHasPaymentMethod model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $order_id_order
     * @param integer $payment_method_id_payment_method
     * @return OrderHasPaymentMethod the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($order_id_order, $payment_method_id_payment_method)
    {
        if (($model = OrderHasPaymentMethod::findOne(['order_id_order' => $order_id_order, 'payment_method_id_payment_method' => $payment_method_id_payment_method])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
