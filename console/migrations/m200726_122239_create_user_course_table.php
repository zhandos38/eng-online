<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_course}}`.
 */
class m200726_122239_create_user_course_table extends Migration
{
    public $tableName = '{{%user_course}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'course_id' => $this->integer(),
            'created_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-user-course-user_id-user-id', $this->tableName, 'user_id', 'user', 'id', 'SET NULL');
        $this->addForeignKey('fk-user-course-course_id-user-id', $this->tableName, 'course_id', 'course', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-user-course-user_id-user-id', $this->tableName);
        $this->dropForeignKey('fk-user-course-course_id-user-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
