<?php


namespace frontend\controllers;


use common\models\Course;
use common\models\CourseLesson;
use common\models\UserCourse;
use Yii;
use yii\db\Exception;
use yii\web\Controller;

class CourseController extends Controller
{
    public function actionIndex()
    {
        $courses = Course::find()->all();
        return $this->render('index', [
            'courses' => $courses
        ]);
    }

    public function actionView($id)
    {
        $course = Course::findOne(['id' => $id]);
        return $this->render('view', [
            'course' => $course
        ]);
    }

    public function actionLesson($id)
    {
        $lesson = CourseLesson::findOne(['id' => $id]);
        return $this->render('lesson', [
            'lesson' => $lesson
        ]);
    }

    public function actionBuy($id) {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/signup']);
        }

        $course = Course::findOne(['id' => $id]);
        if (empty($course)) {
            throw new Exception('Курс не найден');
        }

        $userCourse = new UserCourse();
        $userCourse->course_id = $course->id;
        $userCourse->user_id = Yii::$app->user->getId();
        $userCourse->created_at = time();
        if (!$userCourse->save()) {
            throw new Exception('Не удалось приобрести курс');
        }

        Yii::$app->session->setFlash('success', 'Поздравляем, вы успешно приобрели курс');
        return $this->redirect(['user/courses']);
    }
}