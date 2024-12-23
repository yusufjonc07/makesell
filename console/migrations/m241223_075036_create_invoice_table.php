<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%invoice}}`.
 */
class m241223_075036_create_invoice_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%invoice}}', [
            'id' => $this->primaryKey(),
            'customer_id'=>$this->integer()->notNull(),
            'total_value' => $this->money(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
            'number'=>$this->integer()->notNull(),
            'status'=>$this->smallInteger()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%invoice}}');
    }
}
