<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_course_lesson}}`.
 */
class m200726_125308_create_user_course_lesson_table extends Migration
{
    public $tableName = '{{%user_course_lesson}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'user_course_id' => $this->integer(),
            'lesson_id' => $this->integer(),
            'test_rate' => $this->integer(),
            'qna_rate' => $this->integer(),
            'created_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-user-course-lesson-user_course_id-user-course-id', $this->tableName, 'user_course_id', 'user_course', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-user-course-lesson-user_course_id-user-course-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
