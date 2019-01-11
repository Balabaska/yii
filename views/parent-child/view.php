<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ParentChild */

$this->title = $model->PC;
$this->params['breadcrumbs'][] = ['label' => 'Родители - дети', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parent-child-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->PC], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->PC], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PC',
            'fk_PR',
            'fk_CH',
        ],
    ]) ?>

</div>
