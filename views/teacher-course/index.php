<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeacherCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Преподаватели - курсы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить курс преподавателю', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TC',
            'fk_T',
            [
                'attribute' => 'Преподаватель',
                'value' => 'teacher.NAME',
            ],
            'fk_C',
            [
                'attribute' => 'Курс',
                'value' => 'course.NAME',
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
