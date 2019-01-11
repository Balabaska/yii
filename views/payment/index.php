<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Платежи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать учёт платёжа', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'DATA_OF_PAYMENT',
            //'P',
            //'fk_A',
            /*[
                'attribute' => 'Родитель',
                'value' => 'ancestor.NAME',
            ],*/
            //'fk_CH',
            [
                'attribute' => 'Ребёнок',
                'value' => 'child.NAME',
            ],
            //'fk_CR',
            [
                'attribute' => 'Курс',
                'value' => 'course.NAME',
            ],
            'COST',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
