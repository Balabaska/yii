<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChildSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="child-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'C') ?>

    <?= $form->field($model, 'NAME') ?>

    <?= $form->field($model, 'NUMBER_PHONE') ?>

    <?= $form->field($model, 'DATA_OF_BIRTH') ?>

    <?= $form->field($model, 'EMAIL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
