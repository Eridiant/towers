<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%floor_b}}`.
 */
class m211126_121338_create_floor_b_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%floor_b}}', [
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
        $this->dropTable('{{%floor_b}}');
    }
}
