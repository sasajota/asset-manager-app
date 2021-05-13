<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Asset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asset_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'introduction_date')->textInput() ?>

    <?= $form->field($model, 'asset_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assignee_id')->textInput() ?>

    <?= $form->field($model, 'facility_id')->textInput() ?>

    <?= $form->field($model, 'asset_status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
