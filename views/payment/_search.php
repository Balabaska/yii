<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'DATA_OF_PAYMENT') ?>

    <?= $form->field($model, 'P') ?>

    <?= $form->field($model, 'fk_A') ?>

    <?= $form->field($model, 'fk_CH') ?>

    <?= $form->field($model, 'fk_CR') ?>

    <?= $form->field($model, 'COST') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
