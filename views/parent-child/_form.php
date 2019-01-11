<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ancestor;
use app\models\Child;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ParentChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parent-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fk_PR')->dropDownList(ArrayHelper::map(Ancestor::find()->all(),'A', 'NAME'),
        ['prompt' => 'Выбрать родителя']); ?>

    <?= $form->field($model, 'fk_CH')->dropDownList(ArrayHelper::map(Child::find()->all(),'C', 'NAME'),
        ['prompt' => 'Выбрать ребёнка']); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
