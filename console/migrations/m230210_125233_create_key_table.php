<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%key}}`.
 */
class m230210_125233_create_key_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%key}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(255),
            'value' => $this->text(),
            'login' => $this->text(),
            'password' => $this->text(),
        ]);

        // creates index for column `key`
        $this->createIndex(
            '{{%idx-key-key}}',
            '{{%key}}',
            'key'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index for column `key`
        $this->dropIndex(
            '{{%idx-key-key}}',
            '{{%key}}'
        );

        $this->dropTable('{{%key}}');
    }
}
