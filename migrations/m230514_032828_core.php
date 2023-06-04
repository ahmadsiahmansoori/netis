
<?php

use yii\db\Migration;

/**
 * Class m230514_032828_core
 */
class m230514_032828_core extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {



        # TODO: Insurance table


        $this->createTable('insurance_companies' ,  [
            'id_insurance' => $this->primaryKey(),
            'name' => $this->string(),
            'code' => $this->integer(),
            'rate' => $this->integer(),
            'path_logo_insurance' => $this->text(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_by' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);


//        $this->createTable('insurance_line_category', [
//            'id_insurance_line_category' => $this->integer(),
//            'name' => $this->string(),
//            'status' => $this->integer(),
//            'created_at' => $this->integer(),
//            'updated_at' => $this->integer(),
//            'updated_by' => $this->integer(),
//            'created_by' => $this->integer(),
//            'delete_mode' => $this->integer(),
//
//        ]);
//
//        $this->createTable('insurance_line' , [
//            'id_insurance_line' => $this->integer(),
//            'insurance_line_category_id' => $this->integer(),
//            'name' => $this->string(),
//            'status' => $this->integer(),
//            'created_at' => $this->integer(),
//            'updated_at' => $this->integer(),
//            'updated_by' => $this->integer(),
//            'created_by' => $this->integer(),
//            'delete_mode' => $this->integer(),
//        ]);



        $this->createTable('company_insurance_support', [
            'id_company_insurance_support' => $this->integer(),
            'insurance_id'=> $this->integer(),
            'insurance_line_id' => $this->integer(),
            'insurance_line_category_id' => $this->integer(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_by' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);


        
        # TODO: user table



        $this->createTable('user_rule',  [
            'id' => $this->primaryKey(),
            'caption' => $this->string(),
            'category_id' => $this->integer(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);



        $this->createTable('user', [
            'id_user' => $this->primaryKey(),
            'rule_id' => $this->integer(),
            'access_id' => $this->integer(), # TODO: append table access , default 1
            'status' => $this->integer(),
            'call_number' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);



        $this->createTable('auth', [
            'id_auth_user' => $this->primaryKey(),
            'user_id'=> $this->integer(),
            'auth_kay'=> $this->text() ,
            'ip' => $this->string(),
            'agent' => $this->text(),
            'expire_date' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_by' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);



        # todo: Order User

        $this->createTable('order', [
            'id_order' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'insurance_company_id' => $this->integer()->notNull(),
            'insurance_line_id' => $this->integer()->notNull(),
            'insurance_line_category_id' => $this->integer()->notNull(),
            'insurance_code' => $this->integer()->null(), # code Bimehnameh hangam sodor
            'status' =>  $this->integer()->notNull(),
            'path_doc_insurance' => $this->text()->null(),
            'final_price' => $this->float(),
            'price' => $this->float(),
            'tax' => $this->float(),
            'toll' => $this->float(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_by' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);

        $this->createTable('order_info', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'order_id' => $this->integer()->notNull(),
            'insurance_line_id' => $this->integer()->notNull(),
            'insurance_line_category_id' => $this->integer()->notNull(),
            'inquiry_id' => $this->integer()->notNull(),
            'detail_id' => $this->integer()->null(),
            'status' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_by' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230514_032828_core cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230514_032828_core cannot be reverted.\n";

        return false;
    }
    */
}
