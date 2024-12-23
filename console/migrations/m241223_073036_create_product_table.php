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
            'name'=>$this->string(),
            'price'=>$this->money(),
            'description'=>$this->text(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'remind_value' => $this->double(2),
            'measurement' => $this->string(),
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
