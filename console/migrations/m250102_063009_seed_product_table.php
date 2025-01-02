<?php

use backend\models\Product;
use Faker\Factory;
use yii\db\Migration;
use yii\web\UploadedFile;

/**
 * Class m250102_063009_seed_product_table
 */
class m250102_063009_seed_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->name = $faker->name;
            $product->image = "{$product->name}.jpg";
            $product->price = $faker->numberBetween( 20, 300);
            $product->remind_value = $faker->numberBetween(10, 100);
            $product->measurement = "unit";

            if($product->save()){
                $random_image_binary = file_get_contents("https://picsum.photos/400/400");
                file_put_contents(__DIR__ ."/../../backend/web/uploads/{$product->image}", $random_image_binary);
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
        echo "m250102_063009_seed_product_table cannot be reverted.\n";

        return false;
    }
    */
}
