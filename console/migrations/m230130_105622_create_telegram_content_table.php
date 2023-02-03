<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_content}}`.
 */
class m230130_105622_create_telegram_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_content}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(11)->notNull()->defaultValue(0),
            'type' => $this->tinyInteger()->notNull()->defaultValue(0),
            'type_name' => $this->string(255),
            'photo' => $this->text(),
            'video' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%telegram_content}}');
    }
}
