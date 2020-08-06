<?php
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Мой профиль');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => \yii\helpers\Url::to(['site/about'])];
?>