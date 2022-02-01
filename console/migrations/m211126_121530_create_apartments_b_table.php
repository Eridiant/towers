<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartments_b}}`.
 */
class m211126_121530_create_apartments_b_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartments_b}}', [
            'id' => $this->primaryKey(),
            'floor_num' => $this->tinyInteger()->notNull(),
            'num' => $this->smallInteger()->notNull(),
            'money' => $this->money(),
            'total_area' => $this->float(),
            'living_space' => $this->float(),
            'balcony_area' => $this->float(),
            'ru' => $this->text(),
            'en' => $this->text(),
            'ge' => $this->text(),
            'he' => $this->text(),
            'status' => $this->tinyInteger()->notNull()->defaultValue(0),
        ]);
        $this->addForeignKey(
            'floors_b-apartments_b',
            '{{%apartments_b}}',
            'floor_num',
            '{{%floor_b}}',
            'floor',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apartments_b}}');
    }
}
