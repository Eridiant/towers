<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartment_info}}`.
 */
class m211001_050714_create_apartment_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartment_info}}', [
            'id' => $this->primaryKey(),
            'apartment_id' => $this->integer(11)->notNull(),
            'area' => $this->float(),
            'price' => $this->money(),
            'img' => $this->string(),
        ]);
        $this->addForeignKey(
            'apartments-apartment_info',
            '{{%apartment_info}}',
            'apartment_id',
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
        $this->dropTable('{{%apartment_info}}');
    }
}
