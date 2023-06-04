<?php

use yii\db\Migration;

/**
 * Class m230429_141408_auth
 */
class m230429_141408_auth extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {






        $this->createTable('auth_user' , [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'farsi_name' => $this->string()->null(),
            'auth_kay' => $this->text()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230429_141408_auth cannot be reverted.\n";

        return false;
    }
    */
}
