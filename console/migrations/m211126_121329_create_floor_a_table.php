<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%floor_a}}`.
 */
class m211126_121329_create_floor_a_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%floor_a}}', [
            'id' => $this->primaryKey(),
            'floor' => $this->tinyInteger()->notNull()->unique(),
            'ru' => $this->text(),
            'en' => $this->text(),
            'ge' => $this->text(),
            'he' => $this->text(),
            'price' => $this->smallInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%floor_a}}');
    }
}
