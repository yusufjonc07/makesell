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
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%stock}}');
    }
}
