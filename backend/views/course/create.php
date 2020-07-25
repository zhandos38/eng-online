<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = 'Создать курс';
$this->params['breadcrumbs'][] = ['label' => 'Курсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
