<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Request */

$this->title = 'Изменить заявку: ' . $model->R;
$this->params['breadcrumbs'][] = ['label' => 'Заявку', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->R, 'url' => ['view', 'id' => $model->R]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
