<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->name ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Разделы', 'options' => ['class' => 'header']],
                    ['label' => 'Пользователи', 'icon' => 'fas fa-user', 'url' => ['user/index']],
                    ['label' => 'Посты', 'icon' => 'fas fa-pencil', 'url' => ['post/index']],
                    ['label' => 'Слайдеры', 'icon' => 'fas fa-image', 'url' => ['slider/index']],
                    ['label' => 'Курсы', 'icon' => 'fas fa-book', 'url' => ['course/index']],
                    ['label' => 'Лекции', 'icon' => 'fas fa-book', 'url' => ['course-lesson/index']],
                    ['label' => 'Лайфхаки', 'icon' => 'fas fa-list', 'url' => ['lifehack/index']],
                    ['label' => 'Тесты', 'icon' => 'fas fa-check-square', 'url' => ['test/index']],
                    ['label' => 'Настройки', 'icon' => 'fas fa-list', 'url' => ['/settings']],
                    ['label' => 'Выход', 'icon' => 'fas fa-times', 'url' => ['site/logout']],
                ],
            ]
        ) ?>

    </section>

</aside>
