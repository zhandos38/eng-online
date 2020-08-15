<?php


namespace frontend\controllers;


use common\models\Answer;
use common\models\Course;
use common\models\CourseLesson;
use common\models\Question;
use common\models\UserCourse;
use common\models\Test;
use common\models\UserCourseLesson;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Response;

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
        if (empty($lesson)) {
            throw new Exception('Урок не найден');
        }

        $userCourse = UserCourse::findOne(['user_id' => Yii::$app->user->getId(), 'course_id' => $lesson->course_id]);
        if (empty($lesson)) {
            throw new Exception('У вас нет доступа к текущему уроку');
        }

        $userCourseLesson = UserCourseLesson::findOne(['user_course_id' => $userCourse->id, 'lesson_id' => $lesson->id]);
        return $this->render('lesson', [
            'lesson' => $lesson,
            'userCourseLesson' => $userCourseLesson
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

    /**
     * @param $id
     * @return array
     */
    public function actionGetTest($id)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $test = Test::find()->where(['course_lesson_id' => $id])->one();

            $data = [
                'id' => $test->id,
                'questions' => [],
                'timeLimit' => $test->time_limit
            ];

            /** @var Question $question */
            /** @var Answer $answer */
            foreach ($test->questions as $question) {
                $answers = [];
                foreach ($question->answers as $answer) {
                    $answers[] = [
                        'id' => $answer->id,
                        'text' => $answer->text,
                        'isRight' => $answer->is_right
                    ];
                }

                shuffle($answers);
                $data['questions'][] = [
                    'id' => $question->id,
                    'text' => $question->text,
                    'selectedAnswerId' => null,
                    'answers' => $answers
                ];
            }
            return $data;
        }
    }

    public function actionSetResult()
    {
        if (!Yii::$app->request->isAjax) {
            throw new HttpException(404, 'Страница не найдена');
        }

        $data = Yii::$app->request->post();

        $lesson = CourseLesson::findOne(['id' => (int)$data['lessonId']]);
        if (empty($lesson)) {
            throw new Exception('Lesson is not found!');
        }

        $userCourse = UserCourse::findOne(['user_id' => Yii::$app->user->getId(), 'course_id' => $lesson->course_id]);
        if (empty($userCourse)) {
            throw new Exception('userCourse is not found!');
        }

        $userCourseLesson = new UserCourseLesson();
        if (!$userCourseLesson) {
            throw new Exception('Test Assignment is not found');
        }

        $userCourseLesson->user_course_id = $userCourse->id;
        $userCourseLesson->lesson_id = $lesson->id;
        $userCourseLesson->test_rate = (int)$data['point'];
        $userCourseLesson->created_at = time();
        if (!$userCourseLesson->save()) {
            throw new Exception('Test result is not saved');
        }

        $user = Yii::$app->user->identity;
        $user->point += $userCourseLesson->test_rate;
        if (!$user->save()) {
            throw new Exception('Баллы не сохранены!');
        }

        return true;
    }
}