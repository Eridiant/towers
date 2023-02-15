<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_user}}`.
 */
class m230215_140241_create_telegram_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_user}}', [
            'id' => $this->integer(11)->notNull(),
            'first_name' => $this->string(255),
            'username' => $this->string(255),
            'lang' => $this->string(24),
            'last_visited_id' => $this->smallInteger(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11),
            'PRIMARY KEY(id)',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%telegram_user}}');
    }
}
