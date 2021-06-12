<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Assignee */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Zaduženi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="assignee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Izmijeni', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Obriši', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Da li ste sigruni da želite da obrišete ovaj unos?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'date_of_birth',
            //'assignee_status',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
