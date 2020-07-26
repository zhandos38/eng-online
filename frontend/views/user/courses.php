<?php
/* @var $this \yii\web\View */
/* @var $courses \common\models\UserCourse */

$this->title = Yii::t('app', 'Мои курсы');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => \yii\helpers\Url::to(['site/about'])];
?>
<?php if (!empty($courses)): ?>
<p data-aos="fade-down" data-aos-duration="500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;<br></p>
<div class="row">
    <?php foreach ($courses as $course): ?>
    <?php $course = $course->course ?>
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
<?php else: ?>
<div class="text-center">
    <img class="no-course-img" src="/img/crying-face.png" alt="Cry cry...">
    <p>
        <?= Yii::t('app', 'Увы... У вас нет ни одного курсы') ?>
    </p>
    <a class="btn btn-success" href="<?= \yii\helpers\Url::to(['course/index']) ?>">
        <?= Yii::t('app', 'Посмотреть все курсы') ?>
    </a>
</div>
<?php endif; ?>