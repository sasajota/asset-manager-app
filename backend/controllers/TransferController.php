<?php

namespace backend\controllers;

use Yii;
use backend\models\Asset;
use backend\models\Assignee;
use backend\models\Facility;
use backend\models\Transfer;
use backend\models\TransferSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransferController implements the CRUD actions for Transfer model.
 */
class TransferController extends Controller
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
     * Lists all Transfer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transfer model.
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
     * Creates a new Transfer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new Transfer();

        if ($model->load(Yii::$app->request->post())) {
            $model->transfer_status = 'ACTIVE';
            $model->created_at = date('Y-m-d H:i:s');

            $assets = Asset::findOne($model->asset_id);
            $assets->assignee_id = $model->assignee_id;
            $assets->facility_id = $model->facility_id;
            $assets->save();
            
            
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $facility = new Facility();
        $facilities = $facility->getAllActive();

        $asset = new Asset();
        $assets = $asset->getAllActive();

        $assignee = new Assignee();
        $assignees = $assignee->getAllActive();
        
        return $this->render('create', [
            'model' => $model,
            'assignees' => $assignees,
            'assets' => $assets,
            'facilities' => $facilities
        ]);

    }
    /**
     * Updates an existing Transfer model.
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

            $asset = Asset::findOne($model->asset_id);

            $asset->assignee_id = $model->assignee_id;
            $asset->facility_id = $model->facility_id;
            $asset->save();

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $facility = new Facility();
        $facilities = $facility->getAllActive();

        $asset = new Asset();
        $assets = $asset->getAllActive();
        
        $assignee = new Assignee();
        $assignees = $assignee->getAllActive();

        return $this->render('update', [
            'model' => $model,
            'assignees' => $assignees,
            'assets' => $assets,
            'facilities' => $facilities
        ]);
    }

    /**
     * Deletes an existing Transfer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Transfer::findOne($id);
        $model->transfer_status = 'INACTIVE';
        $model->deleted_at = date('Y-m-d H:i:s');
        $model->save();
        
        return $this->actionIndex();
    }

    /**
     * Finds the Transfer   model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transfer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transfer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
