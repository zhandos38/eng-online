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
                    ['label' => 'Посты', 'icon' => 'fas fa-user', 'url' => ['post/index']],
                    ['label' => 'Слайдеры', 'icon' => 'fas fa-user', 'url' => ['slider/index']],
                    ['label' => 'Курсы', 'icon' => 'fas fa-user', 'url' => ['course/index']],
                    ['label' => 'Лекции', 'icon' => 'fas fa-user', 'url' => ['course-lesson/index']],
                    ['label' => 'Лайфхаки', 'icon' => 'fas fa-user', 'url' => ['lifehack/index']],
                    ['label' => 'Настройки', 'icon' => 'fas fa-user', 'url' => ['/settings']],
                ],
            ]
        ) ?>

    </section>

</aside>
