<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $course_lesson_id
 * @property int|null $questions_limit
 * @property int|null $time_limit
 * @property int|null $created_at
 *
 * @property CourseLesson $courseLesson
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_lesson_id', 'questions_limit', 'time_limit', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['course_lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseLesson::className(), 'targetAttribute' => ['course_lesson_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'course_lesson_id' => 'Урок',
            'questions_limit' => 'Лимит по колво вопросов',
            'time_limit' => 'Лимит по времени',
            'created_at' => 'Время создания',
        ];
    }

    /**
     * Gets query for [[CourseLesson]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourseLesson()
    {
        return $this->hasOne(CourseLesson::className(), ['id' => 'course_lesson_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['test_id' => 'id'])->orderBy('RAND()')->limit($this->questions_limit);
    }
}
