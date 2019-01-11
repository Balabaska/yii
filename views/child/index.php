<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChildSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Дети';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="child-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить ребёнка', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'C',
            'NAME',
            'NUMBER_PHONE',
            'DATA_OF_BIRTH',
            'EMAIL:email',
            ['attribute'=>'courses','value'=>'coursesAsString'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
