<?php
/* @var $this \yii\web\View */
/* @var $models \common\models\Lifehack */
/* @var $model \common\models\Lifehack */

$this->title = Yii::t('app', 'Все лайфхаки');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => \yii\helpers\Url::to(['lifehack/index'])];
$this->params['subTitle'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
?>
<div class="row">
    <?php foreach ($models as $model): ?>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img w-100 d-block" src="<?= $model->getImage() ?>">
                <div class="card-img-overlay">
                    <h4 class="card-title"><?= $model->name ?></h4>
                    <a class="card-btn btn btn-primary" href="<?= \yii\helpers\Url::to(['lifehack/view', 'id' => $model->id]) ?>">Подробнее</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
