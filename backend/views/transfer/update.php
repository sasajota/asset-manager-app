<?php

use yii\helpers\Html;
use backend\models\Asset;
use backend\models\Assignee;
use backend\models\Facility;

/* @var $this yii\web\View */
/* @var $model backend\models\Transfer */

$this->title = 'Izmjeni informacije o prelaznici: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prelaznice', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Izmjena informacija';
?>
<div class="transfer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'assignees' => $assignees,
        'assets' => $assets,
        'facility' => $facilities
    ]) ?>

</div>
