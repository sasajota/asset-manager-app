<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Facility */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facility-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'facility_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'introduction_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Odaberi datum uvodjenja u upotrebu'],
            'pluginOptions' => [
                'autoclose'=>true
            ]
        ])
    ?>

    <?= $form->field($model, 'location_lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_lon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fac_address')->textInput(['maxlength' => true]) ?>

<<<<<<< HEAD
    <?= $form->field($model, 'details')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
=======
    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'facility_status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE', ], ['prompt' => '']) ?>
>>>>>>> 0b19c3b53b628d6741035d8379e609daf5180743

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
