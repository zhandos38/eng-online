<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lifehack */

$this->title = 'Добавить Lifehack';
$this->params['breadcrumbs'][] = ['label' => 'Lifehacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lifehack-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
