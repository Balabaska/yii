<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\FoundHttpException;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);



    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [

            ['label' => 'Курсы', 'url' => ['/course/index'],
            'visible' => Yii::$app->user->can('viewAdminPage') ],

            ['label' => 'Заявки', 'url' => ['/request/index'],
                'visible' => Yii::$app->user->can('viewAdminPage') ],

            ['label' => 'Платежи', 'url' => ['/payment/index'],
                'visible' => Yii::$app->user->can('viewAdminPage') ],

            ['label' => 'Преподаватели', 'url' => ['/teacher/index'],
                'visible' => Yii::$app->user->can('viewAdminPage') ],

            ['label' => 'Родители', 'url' => ['/ancestor/index'],
                'visible' => Yii::$app->user->can('viewAdminPage') ],

            ['label' => 'Дети', 'url' => ['/child/index'],
                'visible' => Yii::$app->user->can('viewAdminPage') ],

            [
                'label' => 'Отчёты',
                'items' => [
                    ['label' => 'Отчёт о статусе заявок', 'url' => '/report/report-request'],
                    ['label' => 'Отчёт о платежах', 'url' => ['/report/index']],
                ],
                'visible' => Yii::$app->user->can('viewAdminPage')
            ],

            /*['label' => 'Пользователи', 'url' => ['/user/index'],
                'visible' => Yii::$app->user->can('viewAdminPage') ],*/
            Yii::$app->user->isGuest  ? (
                ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);

    NavBar::end();


    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
