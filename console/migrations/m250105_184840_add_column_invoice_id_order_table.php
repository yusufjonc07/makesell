<?php

use yii\db\Migration;

/**
 * Class m250105_184840_add_column_invoice_id_order_table
 */
class m250105_184840_add_column_invoice_id_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('order', 'invoice_id', $this->integer()->after('customer_id'));
        $this->addForeignKey('fk_order_invoice', 'order', 'invoice_id', 'invoice', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_order_invoice', 'order');
        $this->dropColumn('order', 'invoice_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250105_184840_add_column_invoice_id_order_table cannot be reverted.\n";

        return false;
    }
    */
}
