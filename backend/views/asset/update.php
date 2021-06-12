<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Asset */

$this->title = 'Izmjeni informacije o osnovnom sredstvu: ' . $model->asset_name;
$this->params['breadcrumbs'][] = ['label' => 'Osnovna sredstva', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->asset_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Izmjena informacija';
?>
<div class="asset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'assignees' => $assignees,
        'facilities' => $facilities
    ]) ?>

</div>
