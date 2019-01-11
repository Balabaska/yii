<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Course;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAME_PARENT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NUMBER_PHONE')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9 999 999-99-99']) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fk_c')->dropDownList(ArrayHelper::map(Course::find()->all(),'C', 'NAME'),
        ['prompt' => 'Выбрать курс']); ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
