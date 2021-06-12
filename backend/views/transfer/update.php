<?php

use yii\helpers\Html;
use backend\models\Asset;
use backend\models\Assignee;
use backend\models\Facility;

/* @var $this yii\web\View */
/* @var $model backend\models\Transfer */

// add logic for getting asset name in action update of Transfer controller and pass that information
// to this view, and then replace it here where is model->id
$assetName = Asset::findOne($model->asset_id)->asset_name;

$this->title = 'Izmjeni informacije o prelaznici: ' . $assetName;
$this->params['breadcrumbs'][] = ['label' => 'Prelaznice', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $assetName, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Izmjena informacija';
?>
<div class="transfer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'assignees' => $assignees,
        'assets' => $assets,
        'facilities' => $facilities,
        'assetDisabled' => true
    ]) ?>

</div>
