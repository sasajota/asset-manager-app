<?php

use yii\helpers\Html;
use backend\models\Assignee;
use backend\models\Facility;

/* @var $this yii\web\View */
/* @var $model backend\models\Asset */

$this->title = 'Dodaj informacije o osnovnom sredstvu';
$this->params['breadcrumbs'][] = ['label' => 'Osnovna sredstva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'assignees' => $assignees,
        'facilities' => $facilities
    ]) ?>

</div>
