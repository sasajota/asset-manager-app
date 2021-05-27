<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Assignee */

$this->title = 'Kreiraj novi unos';
$this->params['breadcrumbs'][] = ['label' => 'Zaduženi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
