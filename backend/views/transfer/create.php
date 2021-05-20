<?php

use yii\helpers\Html;
use backend\models\Asset;
use backend\models\Assignee;
use backend\models\Facility;

/* @var $this yii\web\View */
/* @var $model backend\models\Transfer */

$this->title = 'Dodajte transfer';
$this->params['breadcrumbs'][] = ['label' => 'Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
        'assignee' => $assignee
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
        'facility' => $facility
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
        'asset' => $asset
    ]) ?>

</div>
