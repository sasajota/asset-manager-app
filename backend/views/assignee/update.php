<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Assignee */

$this->title = 'Izmjeni informacije o zaduženom: ' . $model->assignee_name;
$this->params['breadcrumbs'][] = ['label' => 'Zaduženi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->assignee_name, 'url' => ['view', 'id' => $model->assignee_name]];
$this->params['breadcrumbs'][] = 'Izmjena informacija';
?>
<div class="assignee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
