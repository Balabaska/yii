<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ancestor */

$this->title = 'Изменить родителя: ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Родители', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'id' => $model->A]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="ancestor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //'user' =>$user,
    ]) ?>

</div>
