<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use yii2mod\alert\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= $this->render('_header') ?>

<section class="section-hero">
    <div class="container">
        <div class="section-hero__content">
            <h1 class="section-hero__title"><?= $this->title ?></h1>
            <div>
                <?= Breadcrumbs::widget([
                    'options' => [
                        'class' => 'app-breadcrumbs'
                    ],
                    'homeLink'      =>  [
                        'label'     =>  Yii::t('yii', 'Home'),
                        'url'       =>  ['/site/index'],
                        'class'     =>  'home',
                        'template'  =>  '<i class="fa fa-home"></i>{link}'.PHP_EOL,
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'itemTemplate' => '<i class="fa fa-angle-right"></i>{link}'.PHP_EOL,
                    'tag' =>  'ul',
                ]); ?>
            </div>
        </div>
        <div class="section-hero__footer">
            <p><?= $this->params['subTitle'] ?></p>
        </div>
    </div>
</section>
<section class="section section-content">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</section>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
