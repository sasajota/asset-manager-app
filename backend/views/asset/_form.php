<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Asset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asset_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'introduction_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Odaberi datum uvodjenja u upotrebu'],
            'pluginOptions' => [
                'autoclose'=>true
            ]
        ])
    ?>

    <?= $form->field($model, 'asset_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assignee_id')->textInput() ?>

    <?= $form->field($model, 'facility_id')->textInput() ?>

<<<<<<< HEAD
=======
    <?= $form->field($model, 'asset_status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE', ], ['prompt' => '']) ?>

>>>>>>> 0b19c3b53b628d6741035d8379e609daf5180743
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
