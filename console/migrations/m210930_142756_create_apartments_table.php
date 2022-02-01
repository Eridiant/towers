<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartments}}`.
 */
class m210930_142756_create_apartments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartments}}', [
            'id' => $this->primaryKey(),
            'floor_num' => $this->string(24)->notNull(),
            'num' => $this->string(24),
            'status' => $this->smallInteger(6)->notNull()->defaultValue(0),
        ]);
        $this->addForeignKey(
            'floors-apartments',
            '{{%apartments}}',
            'floor_num',
            '{{%floor}}',
            'floor',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apartments}}');
    }
}
