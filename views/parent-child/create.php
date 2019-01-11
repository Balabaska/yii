<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ParentChild */

$this->title = 'Добавить ребёнка родителю';
$this->params['breadcrumbs'][] = ['label' => 'Родители - дети', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parent-child-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
