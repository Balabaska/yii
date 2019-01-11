<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ancestor */

$this->title = 'Добавить родителя';
$this->params['breadcrumbs'][] = ['label' => 'Родители', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ancestor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        //'user' =>$user,
    ]) ?>

</div>
