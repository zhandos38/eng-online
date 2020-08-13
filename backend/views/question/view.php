<?php

use common\models\Answer;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Question */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Тест', 'url' => ['test/view', 'id' => $model->test_id]];
$this->params['breadcrumbs'][] = ['label' => 'Вопросы', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="question-view">

    <a href="<?= \yii\helpers\Url::to(['test/view', 'id' => $model->test_id]) ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Назад</a>
    <h1>Вопрос: <?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'test_id',
            'text:html',
            'created_at',
        ],
    ]) ?>

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['answer/create', 'question_id' => $model->id], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => 'Варианты'
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $answerDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'text:html',
            [
                'attribute' => 'is_right',
                'value' => function(Answer $model) {
                    return $model->is_right ? 'Да' : 'Нет';
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]) ?>

    <?php LteBox::end() ?>

</div>
