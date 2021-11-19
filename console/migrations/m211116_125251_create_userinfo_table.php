<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%userinfo}}`.
 */
class m211116_125251_create_userinfo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%userinfo}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'phone' => $this->integer(20),
            'mail' => $this->string(255),
            'fb' => $this->string(255),
            'telegram' => $this->string(255),
            'youtube' => $this->string(255),
            'instagram' => $this->string(255),
            'whats_app' => $this->string(255),
            'viber' => $this->string(255),
        ]);
        $this->addForeignKey(
            'user-userinfo',
            '{{%userinfo}}',
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
        $this->dropTable('{{%userinfo}}');
    }
}
