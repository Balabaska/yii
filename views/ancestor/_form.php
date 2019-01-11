<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ancestor */
/* @var $form yii\widgets\ActiveForm */
/* @var $user app\models\User */
?>

<div class="ancestor-form">

    <?php $form = ActiveForm::begin([
        'id' => $model->isNewRecord ? 'ancestor-form-create' : 'ancestor-form-update',
    ]); ?>

     <!-- $form->field($user, 'username')->textInput(['maxlength' => true])

     $form->field($user, 'password')->passwordInput() -->

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NUMBER_PHONE')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '9 999 999-99-99']) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'children_array')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Child::find()->all()
            ,'C','NAME'),
        /*'value' =>\yii\helpers\ArrayHelper::map($teacher->courses,'C','NAME'),*/
        'language' => 'ru',
        'options' => ['placeholder' => 'Добавить запись о ребёнке',
            'multiple'=>true],
        'pluginOptions' => [
            'allowClear' => true,
            'children' => true,
            'maximumInputLength' =>10
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
