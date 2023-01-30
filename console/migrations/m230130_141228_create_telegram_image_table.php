<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_image}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%telegram_content}}`
 */
class m230130_141228_create_telegram_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_image}}', [
            'id' => $this->primaryKey(),
            'content_id' => $this->integer()->notNull(),
            'photo' => $this->text(),
            'caption' => $this->text(),
            'parse_mode' => $this->string(24),
            'reply_markup' => $this->text(),
        ]);

        // creates index for column `content_id`
        $this->createIndex(
            '{{%idx-telegram_image-content_id}}',
            '{{%telegram_image}}',
            'content_id'
        );

        // add foreign key for table `{{%telegram_content}}`
        $this->addForeignKey(
            '{{%fk-telegram_image-content_id}}',
            '{{%telegram_image}}',
            'content_id',
            '{{%telegram_content}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%telegram_content}}`
        $this->dropForeignKey(
            '{{%fk-telegram_image-content_id}}',
            '{{%telegram_image}}'
        );

        // drops index for column `content_id`
        $this->dropIndex(
            '{{%idx-telegram_image-content_id}}',
            '{{%telegram_image}}'
        );

        $this->dropTable('{{%telegram_image}}');
    }
}
