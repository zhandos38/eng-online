<?php
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'ТОП 100');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => \yii\helpers\Url::to(['site/about'])];
?>
<div class="row">
    <table class="table">
        <thead>
        <tr>
            <th>Ф.И.О</th>
            <th>Город (Район)</th>
            <th>Балл</th>
        </tr>
        </thead>
        <tbody>
        <?php /** @var \common\models\User $users */
        foreach ($users as $user): ?>
        <tr>
            <td><?= $user->surname ?> <?= $user->name ?></td>
            <td><?= $user->location ?></td>
            <td><?= $user->point ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
