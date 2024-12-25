<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%production_ingredient}}`.
 */
class m241225_061550_create_production_ingredient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%production_ingredient}}', [
            'id' => $this->primaryKey(),
            'production_id'=>$this->integer()->notNull(),
            'product_id'=>$this->integer()->notNull(),
            'qty'=>$this->double()->notNull(),
            'price'=>$this->double()->notNull(),
        ]);

        $this->addForeignKey('fk-production_ingredient-production_id', 'production_ingredient', 'production_id', 'production', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-production_ingredient-product_id', 'production_ingredient', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-production_ingredient-production_id', 'production_ingredient');

        $this->dropForeignKey('fk-production_ingredient-product_id', 'production_ingredient');

        $this->dropTable('{{%production_ingredient}}');
    }
}
