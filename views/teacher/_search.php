<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $teacher app\models\TeacherSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($teacher, 'T') ?>

    <?= $form->field($teacher, 'NAME') ?>

    <?= $form->field($teacher, 'NUMBER_PHONE') ?>

    <?= $form->field($model, 'EMAIL') ?>

    <?= $form->field($model, 'QUALIFICATION') ?>

    <?= $form->field($teacher, 'fk_u') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
