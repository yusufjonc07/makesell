<?php

use yii\db\Migration;

/**
 * Class m241229_034038_add_image_column_product
 */
class m241229_034038_add_image_column_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'isTradable', $this->boolean()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'isTradable');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241229_034038_add_image_column_product cannot be reverted.\n";

        return false;
    }
    */
}
