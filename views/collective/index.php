<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CollectiveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Связи в группах';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="collective-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить ребёнка в группу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'C',
            'fk_CH',
            [
                'attribute' => 'Ребёнок',
                'value' => 'child.NAME',
            ],
            'fk_CR',
            [
                'attribute' => 'Курс',
                'value' => 'course.NAME',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
