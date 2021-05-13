<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Transfer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transfer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asset_id')->textInput() ?>

    <?= $form->field($model, 'assignee_id')->textInput() ?>

    <?= $form->field($model, 'facility_id')->textInput() ?>

    <?= $form->field($model, 'transfer_status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
