<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'phone' => $this->string()->unique(),
            'purpose' => $this->string()->notNull(),
            'business_type' => $this->string(),
            'business_desciption' => $this->string(),
            'company_scale' => $this->string(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->defaultExpression('NOW()'),
            
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'username' => 'admin',
            'phone' => '1234567890',
            'purpose' => 'findjob',
            'business_type' => 'manufacturer',
            'business_desciption' => 'admin',
            'company_scale' => 'admin',
            'auth_key' => 'admin',
            'status' => 10,
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'email' => 'ulala@example.com'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
