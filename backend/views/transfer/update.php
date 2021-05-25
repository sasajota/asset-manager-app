<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Transfer */

$this->title = 'Izmjenite transfer: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transfer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'assignees' => $assignees,
        'assets' => $assets,
        'facility' => $facilities
    ]) ?>

</div>
