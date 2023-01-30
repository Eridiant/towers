<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_query}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%telegram_content}}`
 */
class m230130_140355_create_telegram_query_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_query}}', [
            'id' => $this->primaryKey(),
            'content_id' => $this->integer()->notNull(),
            'lang' => $this->string(255)->notNull(),
            'query' => $this->string(255)->notNull(),
        ]);

        // creates index for column `content_id`
        $this->createIndex(
            '{{%idx-telegram_query-content_id}}',
            '{{%telegram_query}}',
            'content_id'
        );

        // add foreign key for table `{{%telegram_content}}`
        $this->addForeignKey(
            '{{%fk-telegram_query-content_id}}',
            '{{%telegram_query}}',
            'content_id',
            '{{%telegram_content}}',
            'id',
            'CASCADE'
        );

        // creates index for column `query`
        $this->createIndex(
            '{{%idx-telegram_query-query}}',
            '{{%telegram_query}}',
            'query'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index for column `query`
        $this->dropIndex(
            '{{%idx-telegram_query-query}}',
            '{{%telegram_query}}'
        );

        // drops foreign key for table `{{%telegram_content}}`
        $this->dropForeignKey(
            '{{%fk-telegram_query-content_id}}',
            '{{%telegram_query}}'
        );

        // drops index for column `content_id`
        $this->dropIndex(
            '{{%idx-telegram_query-content_id}}',
            '{{%telegram_query}}'
        );

        $this->dropTable('{{%telegram_query}}');
    }
}
