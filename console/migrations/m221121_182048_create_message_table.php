<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%source}}`
 */
class m221121_182048_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'language_id' => $this->integer()->notNull(),
            'source_id' => $this->integer()->notNull(),
            'text' => $this->text(),
        ]);

        // creates index for column `source_id`
        $this->createIndex(
            '{{%idx-message-source_id}}',
            '{{%message}}',
            'source_id'
        );

        // add foreign key for table `{{%source}}`
        $this->addForeignKey(
            '{{%fk-message-source_id}}',
            '{{%message}}',
            'source_id',
            '{{%source}}',
            'id',
            'CASCADE'
        );

        // creates index for column `language_id`
        $this->createIndex(
            '{{%idx-message-language_id}}',
            '{{%message}}',
            'language_id'
        );

        // add foreign key for table `{{%language}}`
        $this->addForeignKey(
            '{{%fk-message-language_id}}',
            '{{%message}}',
            'language_id',
            '{{%language}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%language}}`
        $this->dropForeignKey(
            '{{%fk-message-language_id}}',
            '{{%message}}'
        );

        // drops index for column `language_id`
        $this->dropIndex(
            '{{%idx-message-language_id}}',
            '{{%message}}'
        );

        // drops foreign key for table `{{%source}}`
        $this->dropForeignKey(
            '{{%fk-message-source_id}}',
            '{{%message}}'
        );

        // drops index for column `source_id`
        $this->dropIndex(
            '{{%idx-message-source_id}}',
            '{{%message}}'
        );

        $this->dropTable('{{%message}}');
    }
}
