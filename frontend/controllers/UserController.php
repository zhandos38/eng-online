<?php


namespace frontend\controllers;


use common\models\Course;
use common\models\User;
use common\models\UserCourse;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionProfile($id)
    {
        $user = User::findOne(['id' => $id]);
        return $this->render('profile', [
            'user' => $user
        ]);
    }

    public function actionCourses()
    {
        $courses = UserCourse::findAll(['user_id' => Yii::$app->user->getId()]);
        return $this->render('courses', [
            'courses' => $courses
        ]);
    }
}