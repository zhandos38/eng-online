<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lifehack */

$this->title = 'Обновить Lifehack: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lifehacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lifehack-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
