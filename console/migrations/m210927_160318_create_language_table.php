<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%language}}`.
 */
class m210927_160318_create_language_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%language}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'key' => $this->string()->notNull(),
            'default' => $this->smallInteger(6)->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'deleted_at' => $this->integer(),
        ]);
        // $this->batchInsert('{{%language}}', ['name', 'key', `default`, `updated_at`, `created_at`, `deleted_at`], [
        //     ['English', 'en-US', 1, 1568637622, 1568271399, NULL],
        //     ['Русский', 'ru-RU', 0, 1568640706, 1568271399, NULL],
        //     ['Espanol', 'he-HE', 0, 1621158048, 1621158048, NULL],
        // ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%language}}');
    }
}
