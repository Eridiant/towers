<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_chat}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m230215_160759_create_telegram_chat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_chat}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'text' => $this->text(),
            'created_at' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-telegram_chat-user_id}}',
            '{{%telegram_chat}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-telegram_chat-user_id}}',
            '{{%telegram_chat}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-telegram_chat-user_id}}',
            '{{%telegram_chat}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-telegram_chat-user_id}}',
            '{{%telegram_chat}}'
        );

        $this->dropTable('{{%telegram_chat}}');
    }
}
