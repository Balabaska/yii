<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Child */

$this->title = 'Изменить ребёнка: ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Дети', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->C]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="child-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
