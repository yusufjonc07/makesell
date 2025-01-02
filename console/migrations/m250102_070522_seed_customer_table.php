<?php

use backend\models\Customer;
use Faker\Factory;
use yii\db\Migration;

/**
 * Class m250102_070522_seed_customer_table
 */
class m250102_070522_seed_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Factory::create();


        for ($i = 0; $i < 100; $i++) {

            $customer = new Customer();
            $customer->name = $faker->name;
            $customer->email = $faker->email;
            $customer->phone = $faker->e164PhoneNumber;
            $customer->status = $faker->randomElement([1, 0]);
            $customer->balance = $faker->numberBetween(100, 1000);
            $customer->save();
        }

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
        echo "m250102_070522_seed_customer_table cannot be reverted.\n";

        return false;
    }
    */
}
