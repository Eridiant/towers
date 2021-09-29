<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lg_message}}`.
 */
class m210927_170137_create_lg_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lg_message}}', [
            'id' => $this->primaryKey(),
            'language' => $this->string(16)->notNull(),
            'translation' => $this->string(16),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lg_message}}');
    }
}
