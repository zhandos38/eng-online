<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Question */

$this->title = 'Create Question';
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-create">

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
