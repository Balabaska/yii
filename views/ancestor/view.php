<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ancestor */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Родители', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ancestor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->A], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->A], [
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
            'A',
            'NAME',
            'NUMBER_PHONE',
            'EMAIL:email',
            //'fk_u',
            'childrenAsString'
        ],
    ]) ?>

</div>
