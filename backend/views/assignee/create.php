<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Assignee */

$this->title = 'Create Assignee';
$this->params['breadcrumbs'][] = ['label' => 'Assignees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
