<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%floor}}`.
 */
class m210930_113013_create_floor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%floor}}', [
            'id' => $this->primaryKey(),
            'floor' => $this->string(24),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%floor}}');
    }
}
