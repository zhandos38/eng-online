<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question}}`.
 */
class m200809_122929_create_question_table extends Migration
{
    public $tableName = '{{%question}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'test_id' => $this->integer(),
            'text' => $this->text(),
            'created_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-question-test_id-test-id', $this->tableName, 'test_id', '{{%test}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-question-test_id-test-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
