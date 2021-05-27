<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Osnovna sredstva';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kreiraj novi unos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'asset_name',
            'introduction_date',
            'asset_value',
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
            //'asset_status',
            //'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
