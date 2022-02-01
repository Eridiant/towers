<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartments_c}}`.
 */
class m211126_121542_create_apartments_c_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartments_c}}', [
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
            'floors_c-apartments_c',
            '{{%apartments_c}}',
            'floor_num',
            '{{%floor_c}}',
            'floor',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apartments_c}}');
    }
}
