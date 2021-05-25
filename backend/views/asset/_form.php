<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use backend\models\Assignee;
use backend\models\Facility;


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
                'autoclose'=>true,
                'format' => 'yyyy-m-dd'
            ]
        ])
    ?>

    <?= $form->field($model, 'asset_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assignee_id')->widget(Select2::classname(), [
            'data' => $assignees,
            'options' => ['placeholder' => 'Odaberi korisnika'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

    <?= $form->field($model, 'facility_id')->widget(Select2::classname(), [
            'data' => $facilities,
            'options' => ['placeholder' => 'Odaberi lokaciju'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Sačuvaj', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
