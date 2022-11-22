<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%source}}`.
 */
class m221121_181921_create_source_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%source}}', [
            'id' => $this->primaryKey(),
            'src' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%source}}');
    }
}
