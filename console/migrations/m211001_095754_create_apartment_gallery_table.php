<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartment_gallery}}`.
 */
class m211001_095754_create_apartment_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartment_gallery}}', [
            'id' => $this->primaryKey(),
            'gallery_id' => $this->integer(11)->notNull(),
            'gallery' => $this->string(),
        ]);
        $this->addForeignKey(
            'apartments-apartment_gallery',
            '{{%apartment_gallery}}',
            'gallery_id',
            '{{%apartments}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apartment_gallery}}');
    }
}
