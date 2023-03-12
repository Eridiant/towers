<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_waiting_list}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%telegram_user}}`
 */
class m230312_164627_create_telegram_waiting_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_waiting_list}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'admin_id' => $this->bigInteger(),
            'status' => $this->tinyInteger()->notNull()->defaultValue(0),
            'request_time' => $this->integer(11)->notNull(),
            'response_time' => $this->integer(11),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-telegram_waiting_list-user_id}}',
            '{{%telegram_waiting_list}}',
            'user_id'
        );

        // add foreign key for table `{{%telegram_user}}`
        $this->addForeignKey(
            '{{%fk-telegram_waiting_list-user_id}}',
            '{{%telegram_waiting_list}}',
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
            '{{%fk-telegram_waiting_list-user_id}}',
            '{{%telegram_waiting_list}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-telegram_waiting_list-user_id}}',
            '{{%telegram_waiting_list}}'
        );

        $this->dropTable('{{%telegram_waiting_list}}');
    }
}
