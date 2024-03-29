<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Assignee;
use backend\models\Facility;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'asset_name') ?>

    <?= $form->field($model, 'introduction_date') ?>

    <?= $form->field($model, 'asset_value') ?>

    <?= $form->field($model, 'assignee_id') ?>

    <?= $form->field($model, 'facility_id') ?>

    <?php // echo $form->field($model, 'asset_status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Pretraži', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Rezetuj', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
