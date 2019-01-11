<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParentChildSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Родители - дети';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parent-child-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить ребёнка родителю', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PC',
            'fk_PR',
            [
                'attribute' => 'Родитель',
                'value' => 'ancestor.NAME',
            ],
            'fk_CH',
            [
                'attribute' => 'Ребёнок',
                'value' => 'child.NAME',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
