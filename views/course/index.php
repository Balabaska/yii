<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    /*Html::a ('Create Course', ['create'], ['class' => 'btn btn-success']) */?>

    <p>

        <?php if (Yii::$app->user->can('viewAdminPage')): ?>
            <?= Html::a ('Добавить курс', ['create'], ['class' => 'btn btn-success'])
            ?>
        <?php endif; ?>


    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'C',
            'NAME',
            'DURATION',
            'PLACE',
            'COST',
            ['class' => 'yii\grid\ActionColumn',
                'template' => Yii::$app->user->isGuest ? '{view}' : '{view}{update}{delete}',],
            [
                'format' => 'html',
                'value' => function($model) {
                    return Html::a(
                        'Отправить заявку',
                        Url::to(['request/create', 'id' => $model->C])
                            ,['class'=>'btn btn-primary']
                    );
                }
            ]
        ],
    ]); ?>
</div>
