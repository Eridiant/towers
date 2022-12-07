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
            'src' => $this->text(255),
        ]);

        // creates index for column `src`
        $this->createIndex(
            '{{%idx-source-src}}',
            '{{%source}}',
            'src'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index for column `src`
        $this->dropIndex(
            '{{%idx-source-src}}',
            '{{%source}}'
        );

        $this->dropTable('{{%source}}');
    }
}
