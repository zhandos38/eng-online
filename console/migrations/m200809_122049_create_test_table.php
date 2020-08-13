<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test}}`.
 */
class m200809_122049_create_test_table extends Migration
{
    public $tableName = '{{%test}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'course_lesson_id' => $this->integer(),
            'questions_limit' => $this->integer()->defaultValue(40),
            'time_limit' => $this->integer()->defaultValue(60),
            'created_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-test-course_lesson_id-course_lesson-id', $this->tableName, 'course_lesson_id', '{{%course_lesson}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-test-course_lesson_id-course_lesson-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
