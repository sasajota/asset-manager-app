<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
<<<<<<< HEAD
use kartik\date\DatePicker;
=======
>>>>>>> 0b19c3b53b628d6741035d8379e609daf5180743

/* @var $this yii\web\View */
/* @var $model backend\models\Assignee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assignee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

<<<<<<< HEAD
    <?= $form->field($model, 'date_of_birth')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Odaberi datum rođenja'],
            'pluginOptions' => [
                'autoclose'=>true
            ]
        ])
    ?>
=======
    <?= $form->field($model, 'date_of_birth')->textInput() ?>

    <?= $form->field($model, 'assignee_status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE', ], ['prompt' => '']) ?>
>>>>>>> 0b19c3b53b628d6741035d8379e609daf5180743

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
