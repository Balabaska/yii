<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'R',
            'NAME_PARENT',
            'NUMBER_PHONE',
            'EMAIL',
            //'fk_c',
            [
                'attribute' => 'Курс',
                'value' => 'course.NAME',
            ],

            ['class' => 'yii\grid\ActionColumn'],
            [
                'format' => 'html',
                'value' => function($model) {
                    if(empty($model))
                        echo "model is empty";
                    else {
                        return Html::a('Принять заявку',
                            //'<span class="glyphicon glyphicon-envelope">',
                            //['/request/add-ancestor'],['class'=>'btn btn-primary']
                            Url::to(['request/add-ancestor', 'id' => $model->R])
                            ,['class'=>'btn btn-primary']
                        );
                    }
                }
            ]
        ],
    ]); ?>
</div>
