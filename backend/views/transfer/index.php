<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Asset;
use backend\models\Assignee;
use backend\models\Facility;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prelaznice';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kreirajte novi unos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'asset_id',
                'value' => 'asset.asset_name'
            ],
            [
                'attribute' => 'assignee_id',
                'value' => function ($model) {
                    return $model->getAssignee()->one()->first_name . ' ' . $model->getAssignee()->one()->last_name;
                }
            ],
            [
                'attribute' => 'facility_id',
                'value' => 'facility.facility_name'
            ],
            //'transfer_status',
            //'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
