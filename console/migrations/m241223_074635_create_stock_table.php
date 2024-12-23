<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stock}}`.
 */
class m241223_074635_create_stock_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stock}}', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer()->notNull(),
            'qty'=>$this->double()->notNull(),
            'created_at'=>$this->timestamp()->notNull(),
            'updated_at'=>$this->timestamp()->notNull(),
            'price'=>$this->money()->notNull(),
        ]);

        $this->addForeignKey('fk-stock-product_id', 'stock', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk-stock-product_id', 'supply');

        $this->dropTable('{{%stock}}');
    }
}
