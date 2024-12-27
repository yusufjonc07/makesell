<?php

use yii\db\Migration;

/**
 * Class m241227_162418_add_image_column_product
 */
class m241227_162418_add_image_column_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'image', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product', 'image');
    }

}
