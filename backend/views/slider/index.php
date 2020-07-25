<?php

use common\models\Slider;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайдеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <?php

    LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ])

    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'img',
            'link',
            [
                'attribute' => 'created_at',
                'value' => function(Slider $model) {
                    return date('d-m-Y H:i', $model->created_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>

    <?php LteBox::end() ?>

</div>
