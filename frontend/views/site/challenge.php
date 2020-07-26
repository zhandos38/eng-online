<?php
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'ТОП 100');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => \yii\helpers\Url::to(['site/about'])];
?>