<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lg_source_message}}`.
 */
class m210928_061335_create_lg_source_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lg_source_message}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string(255),
            'message' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lg_source_message}}');
    }
}
