<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ParentChild */

$this->title = 'Изменить связь родители - дети: ' . $model->PC;
$this->params['breadcrumbs'][] = ['label' => 'Родители - дети', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PC, 'url' => ['view', 'id' => $model->PC]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="parent-child-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
