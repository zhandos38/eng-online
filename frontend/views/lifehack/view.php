<?php
use common\models\User;

/* @var $this \yii\web\View */
/* @var $model \common\models\Lifehack */

$this->title = Yii::t('app', 'Лайфхак') . ': ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Все лайфхаки'), 'url' => \yii\helpers\Url::to(['lifehack/index'])];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => \yii\helpers\Url::to(['lifehack/view', 'id' => $model->id])];
?>
<div class="row">
    <div class="col-md-12">
        <?= $model->description ?>
    </div>
</div>
