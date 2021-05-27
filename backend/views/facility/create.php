<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Facility */

$this->title = 'Kreiraj novi unos';
$this->params['breadcrumbs'][] = ['label' => 'Lokacije', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facility-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
