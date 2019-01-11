<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AncestorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Родители';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ancestor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить родителя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'A',
            'NAME',
            'NUMBER_PHONE',
            'EMAIL:email',
            /*'fk_u',
            [
                'attribute' => 'Логин',
                'value' => 'user.username',
            ],*/
            ['attribute'=>'children','value'=>'childrenAsString'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
