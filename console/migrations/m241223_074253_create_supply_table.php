<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%supply}}`.
 */
class m241223_074253_create_supply_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%supply}}', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer()->notNull(),
            'qty'=>$this->double()->notNull(),
            'created_at'=>$this->timestamp()->notNull(),
            'updated_at'=>$this->timestamp()->notNull(),
            'price'=>$this->money()->notNull(),
        ]);

        $this->addForeignKey('fk-supply-product_id', 'supply', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk-supply-product_id', 'supply');

        $this->dropTable('{{%supply}}');
    }
}
