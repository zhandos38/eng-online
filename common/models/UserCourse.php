<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_course".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $course_id
 * @property int|null $created_at
 *
 * @property Course $course
 * @property User $user
 * @property UserCourseLesson[] $userCourseLessons
 */
class UserCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'course_id', 'created_at'], 'integer'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'course_id' => 'Course ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[UserCourseLessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCourseLessons()
    {
        return $this->hasMany(UserCourseLesson::className(), ['user_course_id' => 'id']);
    }
}
