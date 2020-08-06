<?php
/* @var $this \yii\web\View */
/* @var $lesson \common\models\CourseLesson */

$this->title = Yii::t('app', $lesson->name);
$this->params['breadcrumbs'][] = ['label' => $lesson->course->name, 'url' => \yii\helpers\Url::to(['course/view', 'id' => $lesson->course->id])];
$this->params['breadcrumbs'][] = ['label' => $lesson->name, 'url' => \yii\helpers\Url::to(['course/lesson', 'id' => $lesson->id])];
?>
<div class="row">
    <div class="col-md-8">
        <?= $lesson->content ?>
    </div>
    <div class="col-md-4">
        <ul class="lesson-list list-group">
            <?php foreach ($lesson->course->courseLessons as $key => $item): ?>
                <a class="list-group-item list-group-item-action <?= $item->id === $lesson->id ? 'active' : '' ?>" href="<?= \yii\helpers\Url::to(['course/lesson', 'id' => $item->id]) ?>">
                    <?= $key + 1 ?>. <?= $item->name ?>
                </a>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
