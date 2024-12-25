<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ingredient}}`.
 */
class m241225_060346_create_ingredient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ingredient}}', [
            'id' => $this->primaryKey(),
            'recipe_id'=>$this->integer()->notNull(),
            'product_id'=>$this->integer()->notNull(),
            'qty'=>$this->double()->notNull(),
        ]);

        $this->addForeignKey('fk-ingredient-recipe_id', 'ingredient', 'recipe_id', 'recipe', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-ingredient-product_id', 'ingredient', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-ingredient-recipe_id', 'ingredient');
        $this->dropForeignKey('fk-ingredient-product_id', 'ingredient');

        $this->dropTable('{{%ingredient}}');
    }
}
