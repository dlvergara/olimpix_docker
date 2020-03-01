<?php

namespace app\modules\backoffice\controllers;

use app\models\ResultadoSalto;
use app\models\ServicioDisponible;
use Yii;
use app\models\PruebaSalto;
use app\models\PruebaSaltoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PruebaSaltoController implements the CRUD actions for PruebaSalto model.
 */
class PruebaSaltoController extends Controller
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
     * Lists all PruebaSalto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PruebaSaltoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PruebaSalto model.
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
     * Creates a new PruebaSalto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new PruebaSalto();
        $post = Yii::$app->request->post();
        if ($model->load(Yii::$app->request->post())) {
            $serviciosDisponibles = [];
            foreach ($post['ServicioDisponible'] as $index => $servicio) {
                $servicioDisp = new ServicioDisponible();
                $servicioDisp->evento_id_evento = $model->evento_id_evento;
                $servicioDisp->nombre = "Inscripción prueba - " . $index;
                $servicioDisp->descripcion = $servicio['nombre'];
                $servicioDisp->monto = $servicio['monto'];
                $servicioDisp->disponible = 1;
                $servicioDisp->fecha_inicio = $model->fecha;
                $servicioDisp->fecha_fin = $model->fecha;
                $servicioDisp->cantidad_disponible = 100;
                $servicioDisp->proveedor_id_proveedor = $servicio['proveedor_id_proveedor'];

                if (!empty($servicio['monto'])) {
                    $serviciosDisponibles[] = $servicioDisp;
                }
            }

            $transaction = Yii::$app->db->beginTransaction();
            try {
                if ($model->save()) {
                    /**
                     * @var $servicioDisponible ServicioDisponible
                     */
                    foreach ($serviciosDisponibles as $index => $servicioDisponible) {
                        $servicioDisponible->prueba_salto_id_prueba = $model->id_prueba;
                        $servicioDisponible->porcentaje_comision_olimpix = 3;
                        $servicioDisponible->porcentaje_iva = 0;
                        if (!$servicioDisponible->save()) {
                            throw new \Exception(json_encode($servicioDisponible->getErrors()));
                        }
                    }
                }
                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollBack();
                error_log($e->getMessage());
            }

            return $this->redirect(['view', 'id' => $model->id_prueba]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PruebaSalto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_prueba]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PruebaSalto model.
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
     * Finds the PruebaSalto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PruebaSalto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PruebaSalto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param $id
     * @return ResultadoSalto|null
     * @throws NotFoundHttpException
     */
    protected function findResultadoSaltoModel($id)
    {
        if (($model = ResultadoSalto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param $idPrueba
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionCalificarPrueba($idPrueba)
    {
        $model = $this->findModel($idPrueba);

        return $this->render('calificarPrueba', [
            'model' => $model,
            'resultadoPrevio' => null,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionCalificar($id)
    {
        $model = $this->findResultadoSaltoModel($id);
        $prueba = $this->findModel($model->id_prueba);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        }

        return $this->render('calificarPrueba', [
            'model' => $prueba,
            'resultadoPrevio' => $model,
        ]);
    }
}
