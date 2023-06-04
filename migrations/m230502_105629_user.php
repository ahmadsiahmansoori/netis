<?php

use yii\db\Migration;

/**
 * Class m230502_105629_user
 */
class m230502_105629_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


//        $this->createTable('user' , [
//            'id' => $this->primaryKey(),
//            'call_number' => $this->string(),
//            'auth_kay' => $this->text(),
//            'expire_auth_kay' => $this->integer(),
//            'uId' => $this->text(),
//            'user_last_ip' => $this->string(),
//            'user_last_agent' => $this->text(),
//            'user_last_remote' => $this->string(),
//            'first_name' => $this->string(),
//            'last_name' => $this->string(),
//            'code_melli' => $this->string(),
//            'hbd_date' => $this->integer(),
//            'created_at' => $this->integer(),
//            'updated_at' => $this->integer()
//        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230502_105629_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230502_105629_user cannot be reverted.\n";

        return false;
    }
    */
}
