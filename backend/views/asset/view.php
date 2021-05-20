<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Assignee;
use backend\models\Facility;

/* @var $this yii\web\View */
/* @var $model backend\models\Asset */

$this->title = $model->asset_name;
$this->params['breadcrumbs'][] = ['label' => 'Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Da li ste sigurni da želite da obrišete ovaj unos?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'asset_name',
            'introduction_date',
            'asset_value',
            [
                'label'=>'Zaduženi',
                'value' => function ($model) {
                    return Assignee::findOne(['id' => $model->assignee_id])->first_name;
                }
            ],
            [
                'label'=>'Objekat',
                'value' => function ($model) {
                    return Facility::findOne(['id' => $model->facility_id])->facility_name;
                }
            ],
            'asset_status',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>
    

</div>
