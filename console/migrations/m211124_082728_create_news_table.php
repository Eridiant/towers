<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m211124_082728_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title_ru' => $this->string(),
            'title_en' => $this->string(),
            'title_ge' => $this->string(),
            'title_he' => $this->string(),
            'slug' => $this->string(),
            'image' => $this->string(),
            'ru' => $this->text(),
            'en' => $this->text(),
            'ge' => $this->text(),
            'he' => $this->text(),
            'active' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
