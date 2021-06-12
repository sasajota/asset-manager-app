<?php

use yii\helpers\Html;
use backend\models\Asset;
use backend\models\Assignee;
use backend\models\Facility;

/* @var $this yii\web\View */
/* @var $model backend\models\Transfer */

$this->title = 'Kreiraj novi unos';
$this->params['breadcrumbs'][] = ['label' => 'Prelaznice', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'assignees' => $assignees,
        'assets' => $assets,
        'facilities' => $facilities,
        'assetDisabled' => false
    ]) ?>

</div>
