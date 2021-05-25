<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FacilitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facility-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'facility_name') ?>

    <?= $form->field($model, 'introduction_date') ?>

    <?= $form->field($model, 'location_lat') ?>

    <?= $form->field($model, 'location_lon') ?>

    <?php // echo $form->field($model, 'fac_address') ?>

    <?php // echo $form->field($model, 'details') ?>

    <?php // echo $form->field($model, 'facility_status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Pretraži', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Rezetuj', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
