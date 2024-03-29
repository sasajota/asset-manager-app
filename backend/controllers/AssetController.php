<?php

namespace backend\controllers;

use Yii;
use backend\models\Asset;
use backend\models\Assignee;
use backend\models\Facility;
use backend\models\Transfer;
use backend\models\AssetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssetController implements the CRUD actions for Asset model.
 */
class AssetController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Asset models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Asset model.
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
     * Creates a new Asset model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Asset();

        if ($model->load(Yii::$app->request->post())) {
            $model->asset_status = 'ACTIVE';
            $model->created_at = date('Y-m-d H:i:s');

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }


        $facility = new Facility();
        $facilities = $facility->getAllActive();

        $assignee = new Assignee();
        $assignees = $assignee->getAllActive();
        
        return $this->render('create', [
            'model' => $model,
            'assignees' => $assignees,
            'facilities' => $facilities
        ]);
    }

    /**
     * Updates an existing Asset model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = date('Y-m-d H:i:s');

            $transfer = new Transfer();
            $transfer->asset_id = $model->id;
            $transfer->assignee_id = $model->assignee_id;
            $transfer->facility_id = $model->facility_id;
            $transfer->transfer_status = 'ACTIVE';
            $transfer->created_at = date('Y-m-d H:i:s');
            $transfer->save();

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $facility = new Facility();    
        $facilities = $facility->getAllActive();

        $assignee = new Assignee();
        $assignees = $assignee->getAllActive();
        
        return $this->render('update', [
            'model' => $model,
            'assignees' => $assignees,
            'facilities' => $facilities,
        ]);
    }
    /**
     * Deletes an existing Asset model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Asset::findOne($id);
        $model->asset_status = 'INACTIVE';
        $model->deleted_at = date('Y-m-d H:i:s');
        $model->save();
        return $this->actionIndex();
    }

    /**
     * Finds the Asset model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Asset the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Asset::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
