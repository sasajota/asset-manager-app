<?php

namespace backend\controllers;

use Yii;
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
            $model->status = 'ACTIVE';
            $model->created_at = date('Y-m-d H:i:s');
<<<<<<< HEAD
            
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
=======
        }

        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
>>>>>>> 0b19c3b53b628d6741035d8379e609daf5180743
        }

        return $this->render('create', [
            'model' => $model,
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
<<<<<<< HEAD
            $model->updated_at = date('Y-m-d H:i:s');


            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

         
=======
            $model->status = 'ACTIVE';
            $model->updated_at = date('Y-m-d H:i:s');
        }

        if ($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
>>>>>>> 0b19c3b53b628d6741035d8379e609daf5180743
        return $this->render('update', [
            'model' => $model,
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
        $model = $this->findOne($id);
        $model->status = 'INACTIVE';
        $model->deleted_at = date('Y-m-d H:i:s');
        $model->save();
    }

    /**
     * Finds the Transfer model based on its primary key value.
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
