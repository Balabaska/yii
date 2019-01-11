<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\Course;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $teacher app\models\Teacher */
/* @var $user app\models\User */
/* @var $course app\models\Course*/
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-form">

    <?php $form = ActiveForm::begin([
        'id' => $teacher->isNewRecord ? 'teacher-form-create' : 'teacher-form-update',
    ]); ?>

    <!-- $form->field($user, 'username')->textInput(['maxlength' => true])

     $form->field($user, 'password')->passwordInput() -->

    <?= $form->field($teacher, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($teacher, 'NUMBER_PHONE')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9 999 999-99-99']) ?>

    <?= $form->field($teacher, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($teacher, 'QUALIFICATION')->textInput(['maxlength' => true]) ?>

    <?=$form->field($teacher, 'courses_array')->widget(\kartik\select2\Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->all()
        ,'C','NAME'),
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
