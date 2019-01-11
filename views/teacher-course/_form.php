<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Teacher;
use app\models\Course;
/* @var $this yii\web\View */
/* @var $model app\models\TeacherCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-course-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'fk_T')->dropDownList(ArrayHelper::map(Teacher::find()->all(),'T', 'NAME'),
        ['prompt' => 'Выбрать преподавателя']); ?>

    <?= $form->field($model, 'fk_C')->dropDownList(ArrayHelper::map(Course::find()->all(),'C', 'NAME'),
        ['prompt' => 'Выбрать курс']); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
