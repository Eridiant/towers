<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_log}}`.
 */
class m230129_135840_create_telegram_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_log}}', [
            'id' => $this->primaryKey(),
            'data' => $this->text(),
            'data1' => $this->text(),
            'data2' => $this->text(),
            'data3' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%telegram_log}}');
    }
}
