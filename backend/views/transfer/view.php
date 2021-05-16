<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Transfer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transfer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
<<<<<<< HEAD
            'asset_id', 'value => $model->facility->asset_name',
            'assignee_id','value => $model->assignee->first_name',
            'facility_id','value => $model->facility->facility_name',
=======
            'asset_id',
            'assignee_id',
            'facility_id',
>>>>>>> 0b19c3b53b628d6741035d8379e609daf5180743
            'transfer_status',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>