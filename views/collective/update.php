<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Collective */

$this->title = 'Изменить группу: ' . $model->C;
$this->params['breadcrumbs'][] = ['label' => 'Группы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->C, 'url' => ['view', 'id' => $model->C]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="collective-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
