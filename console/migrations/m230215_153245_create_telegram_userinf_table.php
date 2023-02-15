<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_userinf}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m230215_153245_create_telegram_userinf_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_userinf}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'text' => $this->text(),
            'created_at' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-telegram_userinf-user_id}}',
            '{{%telegram_userinf}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-telegram_userinf-user_id}}',
            '{{%telegram_userinf}}',
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
            '{{%fk-telegram_userinf-user_id}}',
            '{{%telegram_userinf}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-telegram_userinf-user_id}}',
            '{{%telegram_userinf}}'
        );

        $this->dropTable('{{%telegram_userinf}}');
    }
}
