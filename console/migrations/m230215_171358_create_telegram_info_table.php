<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_info}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m230215_171358_create_telegram_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_info}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'name' => $this->string(255),
            'phone' => $this->string(50),
            'mail' => $this->string(320),
            'num_attempts' => $this->tinyInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-telegram_info-user_id}}',
            '{{%telegram_info}}',
            'user_id'
        );

        // add foreign key for table `{{%telegram_user}}`
        $this->addForeignKey(
            '{{%fk-telegram_info-user_id}}',
            '{{%telegram_info}}',
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
            '{{%fk-telegram_info-user_id}}',
            '{{%telegram_info}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-telegram_info-user_id}}',
            '{{%telegram_info}}'
        );

        $this->dropTable('{{%telegram_info}}');
    }
}
