<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m200816_171618_add_location_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'location', $this->string()->after('role'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "Can not be reverted";
    }
}
