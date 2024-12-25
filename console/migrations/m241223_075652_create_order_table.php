<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m241223_075652_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer()->notNull(),
            'qty'=>$this->double()->notNull(),
            'price'=>$this->money()->notNull(),
            'customer_id'=>$this->integer()->notNull(),
            'status'=>$this->smallInteger()->notNull(),
            'created_at'=>$this->timestamp(),
            'updated_at'=>$this->timestamp(),
        ]);

        $this->addForeignKey('fk-order-product_id', 'order', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');

        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-order-product_id', 'order');

        $this->dropTable('{{%order}}');
    }
}
