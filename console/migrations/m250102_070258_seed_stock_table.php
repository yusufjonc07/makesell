<?php

use backend\models\Product;
use backend\models\Stock;
use Faker\Factory;
use yii\db\Migration;

/**
 * Class m250102_070258_seed_stock_table
 */
class m250102_070258_seed_stock_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $products = Product::find()->all();
        $faker = Factory::create();

        foreach ($products as $product) {
            for ($i = 0; $i < 10; $i++) {
                $stock = new Stock();
                $stock->product_id = $product->id;
                $stock->qty = $faker->numberBetween(300, 500);
                $stock->price = $faker->numberBetween($product->price - 5, $product->price + 5);
                $stock->save();
            }
        }

        echo "Seeding completed.\n";
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250102_070258_seed_stock_table cannot be reverted.\n";

        return false;
    }
    */
}
