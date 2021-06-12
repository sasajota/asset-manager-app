<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Assignee */

$this->title = 'Izmjeni informacije o zaduženom: ' . $model->first_name . ' ' . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Zaduženi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->first_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Izmjena informacija';
?>
<div class="assignee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
