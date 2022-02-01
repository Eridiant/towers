<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%scripts}}`.
 */
class m220201_152946_create_scripts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%scripts}}', [
            'id' => $this->primaryKey(),
            'header' => $this->text(),
            'body' => $this->text(),
            'footer' => $this->text(),
        ]);

        $this->insert('{{%scripts}}', []);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%scripts}}');
    }
}
