<?php
use common\models\User;

/* @var $this \yii\web\View */
/* @var $course \common\models\Course */

$this->title = Yii::t('app', 'Курс') . ': ' . $course->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Все курсы'), 'url' => \yii\helpers\Url::to(['course/index'])];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => \yii\helpers\Url::to(['course/view', 'id' => $course->id])];
?>
<div class="row">
    <div class="col-md-8">
        <?= $course->description ?>
    </div>
    <div class="col-md-4">
        <?php if (Yii::$app->user->isGuest || !User::getCourseById($course->id)): ?>
        <div class="offer-box card" style="background: linear-gradient(90deg, rgba(0,0,0,0.2) 20%, rgba(99,81,81,0.2) 40%), url('<?= $course->getImage() ?>')">
            <div class="card-body">
                <div class="offer-box__lessons">
                    <i class="fa fa-list"></i> 18 уроков
                </div>
                <div class="offer-box__price">
                    <i class="fa fa-money"></i> <?= $course->price ?> тг.
                </div>
            </div>
            <div class="card-footer">
                <a class="offer-box__btn btn btn-success" href="<?= \yii\helpers\Url::to(['course/buy', 'id' => $course->id]) ?>">
                    <?= Yii::t('app', 'Приобрести') ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php if (User::getCourseById($course->id)): ?>
        <ul class="lesson-list list-group">
            <?php foreach ($course->courseLessons as $key => $lesson): ?>
                <a class="list-group-item list-group-item-action" href="<?= \yii\helpers\Url::to(['course/lesson', 'id' => $lesson->id]) ?>">
                    <?= $key + 1 ?>. <?= $lesson->name ?>
                </a>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>
