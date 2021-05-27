<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FacilitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lokacije';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-index">

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
            'facility_name',
            'introduction_date',
            'location_lat',
            'location_lon',
            //'fac_address',
            //'details:ntext',
            //'facility_status',
            //'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
