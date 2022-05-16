<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_ip}}`.
 */
class m220505_080344_create_user_ip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_ip}}', [
            'id' => $this->primaryKey(),
            'ip' => $this->integer(10)->unsigned()->notNull(),
            'code' => $this->string(10),
            'preferred_lang' => $this->string(128),
            'preferred_lang_all' => $this->string(1000),
            'ref' => $this->string(1000),
            'country' => $this->string(64),
            'region' => $this->string(128),
            'city' => $this->string(64),
            'checked' => $this->tinyInteger(),
            'created_at' => $this->integer()->notNull(),
        ]);


        // creates index for column `ip`
        $this->createIndex(
            '{{%idx-user-ip-ip}}',
            '{{%user_ip}}',
            'ip'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_ip}}');
    }
}
