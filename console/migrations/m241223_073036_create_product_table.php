<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m241223_073036_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->unique()->notNull(),
            'price'=>$this->money()->notNull(),
            'description'=>$this->text(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'remind_value' => $this->double(2)->notNull(),
            'measurement' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
