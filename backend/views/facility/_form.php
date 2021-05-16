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
                'autoclose' => true,
                'format' => 'yyyy-m-dd'
            ]
        ])
    ?>

    <?= $form->field($model, 'location_lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_lon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fac_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'details')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
