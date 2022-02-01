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
            'id' => $this->integer(11)->notNull(),
            'language' => $this->string(16)->notNull(),
            'translation' => $this->string(16),
        ]);
        $this->addPrimaryKey('id-language_pk', '{{%lg_message}}', ['id', 'language']);
        $this->createIndex(
            'idx-lg_message-language',
            '{{%lg_message}}',
            'language'
        );
        $this->addForeignKey(
            'language-lg_message',
            '{{%lg_message}}',
            'language',
            '{{%language}}',
            'key',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lg_message}}');
    }
}
