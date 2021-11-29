<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%floor_c}}`.
 */
class m211126_121346_create_floor_c_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%floor_c}}', [
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
        $this->dropTable('{{%floor_c}}');
    }
}
