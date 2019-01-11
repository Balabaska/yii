<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TeacherCourse */

$this->title = 'Изменить связь преподаватели - курсы: ' . $model->TC;
$this->params['breadcrumbs'][] = ['label' => 'Преподаватели - курсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TC, 'url' => ['view', 'id' => $model->TC]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="teacher-course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
