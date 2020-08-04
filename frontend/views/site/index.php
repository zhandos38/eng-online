<?php

use common\models\Lifehack;
use yii\helpers\Url;

$this->title = 'Главная страница';
?>
<div class="carousel slide" data-ride="carousel" id="carousel-1">
    <div class="carousel-inner" role="listbox">
        <?php /** @var \common\models\Slider $sliders */
        foreach ($sliders as $k => $slider): ?>
            <div class="carousel-item <?= $k === 0 ? 'active' : '' ?>"><a href="<?= $slider->link ?>"><img class="w-100 d-block" src="<?= $slider->getImage() ?>" alt=<?= $slider->img ?>></a></div>
        <?php endforeach; ?>
    </div>
    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
    <ol class="carousel-indicators">
        <?php foreach ($sliders as $k => $slider): ?>
            <li data-target="#carousel-1" data-slide-to="0" class="<?= $k === 0 ? 'active' : '' ?>"></li>
        <?php endforeach; ?>
    </ol>
</div>
<section id="section-offer" class="section section-offer">
    <div class="container">
        <div class="row">
            <div class="section-offer__content">
                <h2>Изучайте английский язык вместе с нами</h2>
                <p>
                    <?= Yii::t('app', 'Зарегистрируйтесь и пройдите наши бесплатные курсы') ?>
                </p>
                <a class="btn btn-success" href="<?= \yii\helpers\Url::to(['course/index']) ?>">
                    Посмотреть все курсы
                </a>
            </div>
        </div>
    </div>
</section>
<section class="section section-feature">
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-4 col-md-3">
                <a class="feature-card__link-wrapper" href="<?= Url::to(['course/index']) ?>">
                    <div data-aos="fade-left" class="feature-card">
                        <div class="feature-card__image-wrapper"><img class="feature-card__image" src="/img/video.png"></div>
                        <h4 class="feature-card__title">Онлайн курсы</h4>
                        <p>Күн сайын біздің курстарды мыңнан астам студенттер онлайн түрде қарайды.<br></p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a class="feature-card__link-wrapper" href="<?= Url::to(['lifehack/index']) ?>">
                    <div data-aos="fade-right" data-aos-delay="400" class="feature-card">
                        <div class="feature-card__image-wrapper"><img class="feature-card__image" src="/img/puzzle.png"></div>
                        <h4 class="feature-card__title">Лайфхаки</h4>
                        <p>Біз біліммен бөлісеміз және өмірдің қызықты тұстары туралы айтып береміз<br></p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a class="feature-card__link-wrapper" href="<?= Url::to(['site/signup']) ?>">
                    <div data-aos="fade-down" data-aos-delay="200" class="feature-card">
                        <div class="feature-card__image-wrapper"><img class="feature-card__image" src="/img/book.png"></div>
                        <h4 class="feature-card__title">Богатый словарник</h4>
                        <p>Апта сайын сөздікті жаңа сөздермен толықтырып отырамыз.<br></p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a class="feature-card__link-wrapper" href="<?= Url::to(['site/signup']) ?>">
                    <div data-aos="fade-right" data-aos-delay="300" class="feature-card">
                        <div class="feature-card__image-wrapper"><img class="feature-card__image" src="/img/trophy.png"></div>
                        <h4 class="feature-card__title">Онлайн тестирование</h4>
                        <p>Күн сайын біздің курстарды мыңнан астам студенттер онлайн түрде қарайды.<br></p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a class="feature-card__link-wrapper" href="<?= Url::to(['site/signup']) ?>">
                    <div data-aos="fade-up" data-aos-delay="500" class="feature-card">
                        <div class="feature-card__image-wrapper"><img class="feature-card__image" src="/img/dialogue.png"></div>
                        <h4 class="feature-card__title">Online English Club</h4>
                        <p>Күн сайын біздің курстарды мыңнан астам студенттер онлайн түрде қарайды.<br></p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a class="feature-card__link-wrapper" href="<?= Url::to(['course/index']) ?>">
                    <div data-aos="fade-left" data-aos-delay="600" class="feature-card">
                        <div class="feature-card__image-wrapper"><img class="feature-card__image" src="/img/paper.png"></div>
                        <h4 class="feature-card__title">Сертификат</h4>
                        <p>Күн сайын біздің курстарды мыңнан астам студенттер онлайн түрде қарайды.<br></p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a class="feature-card__link-wrapper" href="<?= Url::to(['site/signup']) ?>">
                    <div data-aos="fade-up-right" data-aos-duration="700" class="feature-card">
                        <div class="feature-card__image-wrapper"><img class="feature-card__image" src="/img/help.png"></div>
                        <h4 class="feature-card__title">Круглосуточна поддержка</h4>
                        <p>Күн сайын біздің курстарды мыңнан астам студенттер онлайн түрде қарайды.<br></p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <a class="feature-card__link-wrapper" href="<?= Url::to(['site/signup']) ?>">
                    <div data-aos="fade-down-left" data-aos-delay="800" class="feature-card">
                        <div class="feature-card__image-wrapper"><img class="feature-card__image" src="/img/mobile-app.png"></div>
                        <h4 class="feature-card__title">Мобильное приложения</h4>
                        <p>Күн сайын біздің курстарды мыңнан астам студенттер онлайн түрде қарайды.<br></p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="section-info" class="section section-info">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="info-counter"><span class="info-counter__number count">2018</span>
                    <div class="info-counter__title"><span>Год открытия</span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-counter"><span class="info-counter__number count">18</span>
                    <div class="info-counter__title"><span>Количество курсов</span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-counter"><span class="info-counter__number count"><?= Yii::$app->settings->get('app', 'students') ?></span>
                    <div class="info-counter__title"><span>Зарегистрированных учеников</span></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 data-aos="fade-right" data-aos-duration="200" class="section-about__title" style="padding-top: 20px;">Online English</h1>
                <p data-aos="fade-right" data-aos-duration="300" class="section-about__text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."<br></p>
                <button
                        class="btn btn-primary" data-aos="fade-left" data-aos-duration="500" data-aos-delay="200" type="button">Записаться</button>
            </div>
            <div class="col"><img data-aos="fade-left" data-aos-duration="500" data-aos-delay="150" class="section-about__img" src="/img/english-about.jpg"></div>
        </div>
    </div>
</section>
<section class="section section-courses">
    <div class="container">
        <h1 data-aos="fade-down" data-aos-duration="300">Наши курсы</h1>
        <p data-aos="fade-down" data-aos-duration="500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;<br></p>
        <div class="row">
            <?php /** @var \common\models\Course $courses */
            foreach ($courses as $course): ?>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img w-100 d-block" src="<?= $course->getImage() ?>">
                        <div class="card-img-overlay">
                            <h4 class="card-title"><?= $course->name ?></h4>
                            <p><?= $course->price ?> тг</p>
                            <a class="card-btn btn btn-primary" href="<?= Url::to(['course/view', 'id' => $course->id]) ?>">Подробнее</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="courses__footer">
            <a class="btn btn-primary" href="<?= Url::to(['course/index']) ?>" data-aos="zoom-in" data-aos-delay="300" type="button">Все курсы</a>
        </div>
    </div>
</section>
<section class="section section-lifehacks">
    <div class="container">
        <h1 data-aos="fade-up" data-aos-duration="300">Лайфхаки</h1>
        <p data-aos="fade-up" data-aos-duration="500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;<br></p>
        <div class="row">
            <?php
            /** @var Lifehack $lifehacks */
            /** @var Lifehack $lifehack */
            foreach ($lifehacks as $lifehack): ?>
            <div class="col-md-3">
                <div class="life-hack">
                    <div class="card">
                        <img class="card-img w-100 d-block" src="<?= $lifehack->getImage() ?>">
                        <div class="card-img-overlay">
                            <h4 class="card-title"><?= $course->name ?></h4>
                            <a class="card-btn btn btn-primary" href="<?= Url::to(['lifehack/view', 'id' => $lifehack->id]) ?>">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="lifehacks__footer"><a class="btn btn-primary" href="<?= Url::to(['lifehack/index']) ?>" data-aos="zoom-in" data-aos-duration="300" type="button">Все лайфхаки</a></div>
    </div>
</section>