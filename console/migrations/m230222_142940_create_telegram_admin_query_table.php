<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_admin_query}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m230222_142940_create_telegram_admin_query_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_admin_query}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-telegram_admin_query-user_id}}',
            '{{%telegram_admin_query}}',
            'user_id'
        );

        // add foreign key for table `{{%telegram_user}}`
        $this->addForeignKey(
            '{{%fk-telegram_admin_query-user_id}}',
            '{{%telegram_admin_query}}',
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
            '{{%fk-telegram_admin_query-user_id}}',
            '{{%telegram_admin_query}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-telegram_admin_query-user_id}}',
            '{{%telegram_admin_query}}'
        );

        $this->dropTable('{{%telegram_admin_query}}');
    }
}
