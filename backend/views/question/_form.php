<?php

use vova07\imperavi\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'test_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'text')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'video',
                'fullscreen',
                'imagemanager',
                'fontcolor',
                'fontsize',
                'table',
                'counter',
                'widget',
                'specialchars'
            ],
            'imageUpload' => Url::to(['lifehack/image-upload']),
            'imageManagerJson' => Url::to(['lifehack/images-get']),
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
