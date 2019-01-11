<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

use yii\widgets\MaskedInput;
use yii\widgets\InputWidget ;
use yii\base\Widget ;
use yii\base\Component ;
use yii\base\BaseObject;
/* @var $this yii\web\View */
/* @var $model app\models\Child */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NUMBER_PHONE')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9 999 999-99-99']) ?>


     <?= $form->field($model, 'DATA_OF_BIRTH')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9999-99-99']) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'courses_array')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->all()
            ,'C','NAME'),
        /*'value' =>\yii\helpers\ArrayHelper::map($teacher->courses,'C','NAME'),*/
        'language' => 'ru',
        'options' => ['placeholder' => 'Выбрать курсы',
            'multiple'=>true],
        'pluginOptions' => [
            'allowClear' => true,
            'courses' => true,
            'maximumInputLength' =>10
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
