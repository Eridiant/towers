<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_admin}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m230219_190514_create_telegram_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_admin}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'current_user_id' => $this->bigInteger(),
            'created_at' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-telegram_admin-user_id}}',
            '{{%telegram_admin}}',
            'user_id'
        );

        // add foreign key for table `{{%telegram_user}}`
        $this->addForeignKey(
            '{{%fk-telegram_admin-user_id}}',
            '{{%telegram_admin}}',
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
            '{{%fk-telegram_admin-user_id}}',
            '{{%telegram_admin}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-telegram_admin-user_id}}',
            '{{%telegram_admin}}'
        );

        $this->dropTable('{{%telegram_admin}}');
    }
}
