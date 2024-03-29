<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Facility */

$this->title = $model->facility_name;
$this->params['breadcrumbs'][] = ['label' => 'Lokacije', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="facility-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Izmjeni', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Obriši', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Da li ste sigruni da želite da obrišete ovaj unos?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'facility_name',
            'introduction_date',
            'location_lat',
            'location_lon',
            'fac_address',
            'details:ntext',
            //'facility_status',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
