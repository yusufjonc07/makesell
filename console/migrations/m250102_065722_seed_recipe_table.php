<?php

use backend\models\Ingredient;
use backend\models\Product;
use backend\models\Recipe;
use Faker\Factory;
use yii\db\Migration;

/**
 * Class m250102_065722_seed_recipe_table
 */
class m250102_065722_seed_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Factory::create();

        $ids = range(1, end: 20);

        foreach ($ids as $product_id) {
            for ($i = 0; $i < 3; $i++) {
                $recipe = new Recipe();
                $recipe->product_id = $product_id;
                $recipe->name = $faker->name;

                if ($recipe->save()) {
                    for ($i = 0; $i < 5; $i++) {

                        $filtered_ids = array_filter($ids, function ($p_id) use ($product_id) {
                            return $p_id !== $product_id;
                        });

                        $ingredient = new Ingredient();
                        $ingredient->recipe_id = $recipe->id;
                        $ingredient->product_id = $ids[array_rand($filtered_ids)];
                        $ingredient->qty = $faker->numberBetween(1, 10);
                        $ingredient->save();
                    }
                }
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
        echo "m250102_065722_seed_recipe_table cannot be reverted.\n";

        return false;
    }
    */
}
