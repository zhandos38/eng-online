<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Test;

/* @var $this yii\web\View */
/* @var $model common\models\Test */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="test-view">

    <a href="<?= \yii\helpers\Url::to(['test/index']) ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Назад</a>
    <h1>Тест: <?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'course_lesson_id',
                'value' => function(Test $model) {
                    return $model->courseLesson->name;
                }
            ],
            'questions_limit',
            'time_limit'
        ],
    ]) ?>

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['question/create', 'test_id' => $model->id], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $questionDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'text:html',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['question/view', 'id' => $model->id], [
                            'title' => Yii::t('yii', 'View')]);
                    },
                    'update' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['question/update', 'id' => $model->id], [
                            'title' => Yii::t('yii', 'Update')]);
                    }
                ]
            ],
        ],
    ]) ?>

    <?php LteBox::end() ?>

</div>
