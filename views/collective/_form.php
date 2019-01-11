<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Child;
use app\models\Course;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Collective */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="collective-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_CH')->dropDownList(ArrayHelper::map(Child::find()->all(),'C', 'NAME'),
        ['prompt' => 'Выбрать ребёнка']); ?>

    <?= $form->field($model, 'fk_CR')->dropDownList(ArrayHelper::map(Course::find()->all(),'C', 'NAME'),
        ['prompt' => 'Выбрать курс']); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
