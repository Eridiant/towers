<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartments_a}}`.
 */
class m211126_121520_create_apartments_a_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartments_a}}', [
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
            'floors_a-apartments_a',
            '{{%apartments_a}}',
            'floor_num',
            '{{%floor_a}}',
            'floor',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apartments_a}}');
    }
}
