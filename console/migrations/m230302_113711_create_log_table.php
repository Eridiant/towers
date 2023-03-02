<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%log}}`.
 */
class m230302_113711_create_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%log}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'type' => $this->string(255),
            'value' => $this->text(),
            'value1' => $this->text(),
            'value2' => $this->text(),
            'value3' => $this->text(),
            'value4' => $this->text(),
            'error' => $this->text(),
            'error1' => $this->text(),
            'error2' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%log}}');
    }
}
