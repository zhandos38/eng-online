<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_assignment}}`.
 */
class m200809_123845_create_test_assignment_table extends Migration
{
    public $tableName = '{{%test_assignment}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'test_id' => $this->integer(),
            'user_id' => $this->integer(),
            'point' => $this->integer(),
            'created_at' => $this->integer(),
            'finished_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-test-assignment-user_id-user-id', $this->tableName, 'user_id', 'user', 'id', 'SET NULL');
        $this->addForeignKey('fk-test-assignment-test_id-test-id', $this->tableName, 'test_id', 'test', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-test-assignment-user_id-user-id', $this->tableName);
        $this->dropForeignKey('fk-test-assignment-test_id-test-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
