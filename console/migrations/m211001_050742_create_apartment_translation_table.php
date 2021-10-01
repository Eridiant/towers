<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartment_translation}}`.
 */
class m211001_050742_create_apartment_translation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartment_translation}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apartment_translation}}');
    }
}
