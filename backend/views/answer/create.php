<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Answer */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Тест', 'url' => ['test/view', 'id' => $model->question->test_id]];
$this->params['breadcrumbs'][] = ['label' => 'Вопрос', 'url' => ['question/view', 'id' => $model->question_id]];
$this->params['breadcrumbs'][] = ['label' => 'Варианты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
