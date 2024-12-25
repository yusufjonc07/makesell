<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%production}}`.
 */
class m241225_061207_create_production_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%production}}', [
            'id' => $this->primaryKey(),
            'recipe_id'=>$this->integer()->notNull(),
            'product_id'=>$this->integer()->notNull(),
            'user_id'=>$this->integer()->notNull(),
            'qty'=>$this->double()->notNull(),
            'price'=>$this->money()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('fk-production-user_id', 'production', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-production-recipe_id', 'production', 'recipe_id', 'recipe', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-production-product_id', 'production', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk-production-user_id', 'production');
        $this->dropForeignKey('fk-production-recipe_id', 'production');
        $this->dropForeignKey('fk-production-product_id', 'production');

        $this->dropTable('{{%production}}');
    }
}
