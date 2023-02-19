<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_log}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m230219_111945_create_telegram_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_log}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'query' => $this->string(255),
            'lang' => $this->string(24),
            'data' => $this->text(),
            'error' => $this->text(),
            'created_at' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-telegram_log-user_id}}',
            '{{%telegram_log}}',
            'user_id'
        );

        // add foreign key for table `{{%telegram_user}}`
        $this->addForeignKey(
            '{{%fk-telegram_log-user_id}}',
            '{{%telegram_log}}',
            'user_id',
            '{{%telegram_user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%telegram_user}}`
        $this->dropForeignKey(
            '{{%fk-telegram_log-user_id}}',
            '{{%telegram_log}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-telegram_log-user_id}}',
            '{{%telegram_log}}'
        );

        $this->dropTable('{{%telegram_log}}');
    }
}
