<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%apartments_c}}`.
 */
class m230104_151206_add_money_column_to_apartments_c_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%apartments_c}}', 'money_wh_m', $this->integer()->after('money'));
        $this->addColumn('{{%apartments_c}}', 'money_wh', $this->integer()->after('money'));
        $this->addColumn('{{%apartments_c}}', 'money_m', $this->integer()->after('money'));
        $this->addColumn('{{%apartments_c}}', 'img', $this->tinyInteger()->after('balcony_area'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%apartments_c}}', 'money_m');
        $this->dropColumn('{{%apartments_c}}', 'money_wh');
        $this->dropColumn('{{%apartments_c}}', 'money_wh_m');
        $this->dropColumn('{{%apartments_c}}', 'img');
    }
}
