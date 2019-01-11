<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $teacher app\models\Teacher */
/* @var $tc app\models\TeacherCourse */

$this->title = 'Изменить преподавателя: ' . $teacher->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Преподаватели', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $teacher->NAME, 'url' => ['view', 'id' => $teacher->T]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="teacher-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'teacher' => $teacher,
        //'user' => $user
    ]) ?>



</div>
