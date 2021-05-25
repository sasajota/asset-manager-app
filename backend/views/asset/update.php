<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Asset */

$this->title = 'Izmjenite OS: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Assets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'assignees' => $assignees,
        'facilities' => $facilities
    ]) ?>

</div>
