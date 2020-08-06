<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_course_lesson".
 *
 * @property int $id
 * @property int|null $user_course_id
 * @property int|null $lesson_id
 * @property int|null $test_rate
 * @property int|null $qna_rate
 * @property int|null $created_at
 *
 * @property UserCourse $userCourse
 */
class UserCourseLesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_course_lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_course_id', 'lesson_id', 'test_rate', 'qna_rate', 'created_at'], 'integer'],
            [['user_course_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserCourse::className(), 'targetAttribute' => ['user_course_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_course_id' => 'User Course ID',
            'lesson_id' => 'Lesson ID',
            'test_rate' => 'Test Rate',
            'qna_rate' => 'Qna Rate',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[UserCourse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCourse()
    {
        return $this->hasOne(UserCourse::className(), ['id' => 'user_course_id']);
    }
}
