<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_video}}`.
 * Has foreign keys to the tables:
 *f
 * - `{{%telegram_content}}`
 */
class m230130_141304_create_telegram_video_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_video}}', [
            'id' => $this->primaryKey(),
            'content_id' => $this->integer()->notNull(),
            'video' => $this->text(),
            'caption' => $this->text(),
            'parse_mode' => $this->string(24),
            'reply_markup' => $this->text(),
        ]);

        // creates index for column `content_id`
        $this->createIndex(
            '{{%idx-telegram_video-content_id}}',
            '{{%telegram_video}}',
            'content_id'
        );

        // add foreign key for table `{{%telegram_content}}`
        $this->addForeignKey(
            '{{%fk-telegram_video-content_id}}',
            '{{%telegram_video}}',
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
            '{{%fk-telegram_video-content_id}}',
            '{{%telegram_video}}'
        );

        // drops index for column `content_id`
        $this->dropIndex(
            '{{%idx-telegram_video-content_id}}',
            '{{%telegram_video}}'
        );

        $this->dropTable('{{%telegram_video}}');
    }
}
