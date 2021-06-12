<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Facility */

$this->title = 'Izmjeni informacije o lokaciji: ' . $model->facility_name;
$this->params['breadcrumbs'][] = ['label' => 'Lokacije', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->facility_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Izmjena informacija';
?>
<div class="facility-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
