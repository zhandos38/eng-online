<?php
use common\models\LoginForm;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model LoginForm */

$this->title = 'Подтверждение аккаунта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slm_jk">
    <div class="spliv_acck">
        <div class="slm_head">
            <h6><?= $this->title ?></h6>
        </div>

        <?php $form = ActiveForm::begin([
            'id' => 'verification-form',
            'fieldConfig' => [
                'template' => '{input}<div class="txt_inp">{label}</div>{error}',
            ],
        ]); ?>

            <p>
                На Ваш номер телефона был отправлен смс с кодом для активации аккаунта, пожалуйста введите номер для активации
            </p>
            <br>
            <div class="form_cons2">
                <div class="form_items form_tyu">
                    <?= $form->field($model, 'code') ?>
                </div>
            </div>
            <br>
            <div class="form_bt">
                <?= Html::submitButton('Подтвердить', ['class' => 'btn btn_cl', 'name' => 'verification-button', 'style' => 'width: 100%']) ?>
            </div>
            <br>
            <p>
                Не получили код? <a id="resend-btn" href="#" class="block-disabled">Переотравить <span id="timer-wrapper">через <span id="timer">60</span> сек</span></a>
            </p>

        <?php ActiveForm::end(); ?>

        <div class="slm_foot">
            <a href="<?= Url::to(['site/index']) ?>">
                <i class="fal fa-arrow-alt-circle-left"></i>
                <span>назад</span>
            </a>
        </div>
    </div>
</div>
<?php
$js = <<<JS
let timer = $('#timer');
let timerWrapper = $('#timer-wrapper');
let resendBtn = $('#resend-btn');

countTimer();
resendBtn.click(function() {
  countTimer();
});

function countTimer() {
    resendBtn.addClass('block-disabled');
    let timerCount = 60;
    timer.html(timerCount);
    timerWrapper.show();
    
    $.post({
        url: '/site/resend-verification-code',
        success: function(result) {
            console.log(result);
        },
        error: function() {
            console.log('Resend message error!');
        }
    });
    
    let interval = setInterval(function() {
        timer.html(--timerCount);
        if (timerCount === 0) {
            clearInterval(interval);
            resendBtn.removeClass('block-disabled');
            timerWrapper.hide();
            timer.html('');
        }
    }, 1000);
}
JS;

$this->registerJs($js);
?>
