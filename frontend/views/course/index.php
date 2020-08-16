<?php
/* @var $this \yii\web\View */
/* @var $courses \common\models\Course */
/* @var $course \common\models\Course */

$this->title = Yii::t('app', 'Все курсы');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => \yii\helpers\Url::to(['site/about'])];
$this->params['subTitle'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
?>
<div class="row">
    <?php foreach ($courses as $course): ?>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img w-100 d-block" src="<?= $course->getImage() ?>">
                <div class="card-img-overlay">
                    <h4 class="card-title"><?= $course->name ?></h4>
                    <p><?= $course->price ?> тг</p>
                    <a class="card-btn btn btn-primary" href="<?= \yii\helpers\Url::to(['course/view', 'id' => $course->id]) ?>">Подробнее</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
