<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%feedback}}`.
 */
class m230309_093426_add_sending_status_column_to_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%feedback}}', 'sending_status', $this->tinyInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%feedback}}', 'sending_status');
    }
}
