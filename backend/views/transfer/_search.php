<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Asset;
use backend\models\Assignee;
use backend\models\Facility;

/* @var $this yii\web\View */
/* @var $model backend\models\TransferSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transfer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'asset_id') ?>

    <?= $form->field($model, 'assignee_id') ?>

    <?= $form->field($model, 'facility_id') ?>

    <?= $form->field($model, 'transfer_status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Pretraži', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Rezetuj', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
