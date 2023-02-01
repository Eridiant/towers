<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_message}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%telegram_content}}`
 */
class m230130_141135_create_telegram_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_message}}', [
            'id' => $this->primaryKey(),
            'content_id' => $this->integer()->notNull(),
            'lang' => $this->string(255)->notNull(),
            'text' => $this->text(),
            'parse_mode' => $this->string(24),
            'reply_markup' => $this->text(),
            'pre_markup' => $this->text(),
        ]);

        // creates index for column `content_id`
        $this->createIndex(
            '{{%idx-telegram_message-content_id}}',
            '{{%telegram_message}}',
            'content_id'
        );

        // add foreign key for table `{{%telegram_content}}`
        $this->addForeignKey(
            '{{%fk-telegram_message-content_id}}',
            '{{%telegram_message}}',
            'content_id',
            '{{%telegram_content}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%telegram_content}}`
        $this->dropForeignKey(
            '{{%fk-telegram_message-content_id}}',
            '{{%telegram_message}}'
        );

        // drops index for column `content_id`
        $this->dropIndex(
            '{{%idx-telegram_message-content_id}}',
            '{{%telegram_message}}'
        );

        $this->dropTable('{{%telegram_message}}');
    }
}
