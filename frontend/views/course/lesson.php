<?php
/* @var $this \yii\web\View */
/* @var $lesson \common\models\CourseLesson */

$this->title = Yii::t('app', $lesson->name);
$this->params['breadcrumbs'][] = ['label' => $lesson->course->name, 'url' => \yii\helpers\Url::to(['course/view', 'id' => $lesson->course->id])];
$this->params['breadcrumbs'][] = ['label' => $lesson->name, 'url' => \yii\helpers\Url::to(['course/lesson', 'id' => $lesson->id])];

use yii\web\View; ?>
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
<div class="row">

</div>
    <hr>
<?php if ($lesson->test): ?>
    <?php /** @var \common\models\UserCourseLesson $userCourseLesson */
    if (!$userCourseLesson): ?>
        <div id="test-app" style="margin-top: 20px;">
            <div class="test-app__container">
                <h2><?= Yii::t('app', 'Тестирования') ?></h2>
                <div v-if="!showResultActive">
                    <div class="questions-count">Вопрос: {{ currentQuestionId + 1 }}/{{ questions.length }}</div>
                    <div class="question-box" v-if="questions[currentQuestionId]">
                        <div class="question-box__text" v-html="questions[currentQuestionId].text"></div>
                        <div class="question-box__container">
                            <div class="question-box__answer" v-for="(answer, key) in questions[currentQuestionId].answers">
                                <input v-bind:id="answer.id" class="question-box__answer-input" type="radio" v-bind:name="questions[currentQuestionId].id" v-model="questions[currentQuestionId].selectedAnswerId" v-bind:value="key">
                                <label v-bind:for="answer.id" class="question-box__answer-text" v-html="answer.text"></label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-info site-button" v-on:click="nextQuestion">Следующий вопрос</button>
                </div>
                <div v-else>
                    <div class="questions-correct-count">Вы набрали: {{ correctAnswerCount }}</div>
                    <ol class="question-list">
                        <li class="question-list__item" v-for="question in questions">
                            <span v-html="question.text"></span>
                            <ol class="answer-list" type="a">
                                <li class="answer-list__item" v-for="(answer, key) in question.answers" :class="{'answer-list__item--correct': (answer.isRight && question.selectedAnswerId != key), 'answer-list__item--wrong': (!answer.isRight && question.selectedAnswerId == key), 'answer-list__item--checked-correct': (answer.isRight && question.selectedAnswerId == key)}">
                                    <span v-html="answer.text"></span>
                                    <i class="fab fa-acquisitions-incorporated"></i>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div style="margin-top: 40px; font-weight: bold">
            <i style="color: green" class="fa fa-check-square"></i> <?= Yii::t('app', 'Задании по данному уроку были завершены. Вы набрали {ball} баллов', [ 'ball' => $userCourseLesson->test_rate ]) ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php
$js =<<<JS
testApp.lessonId = "$lesson->id";
console.log(testApp.lessonId);
testApp.getTest();
JS;

$this->registerCssFile('/css/test.css');
$this->registerJsFile('@web/js/vue.js');
$this->registerJsFile('@web/js/test.js');
$this->registerJs($js, View::POS_END);
?>