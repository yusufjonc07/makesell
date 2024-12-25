<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recipe}}`.
 */
class m241225_055659_create_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recipe}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'product_id'=>$this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'used_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('fk-recipe-product_id', 'recipe', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-recipe-product_id', 'recipe');
        
        $this->dropTable('{{%recipe}}');
    }
}
