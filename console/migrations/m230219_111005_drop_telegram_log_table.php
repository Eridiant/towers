<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%telegram_log}}`.
 */
class m230219_111005_drop_telegram_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('{{%telegram_log}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('{{%telegram_log}}', [
            'id' => $this->primaryKey(),
        ]);
    }
}
