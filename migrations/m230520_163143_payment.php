<?php

use yii\db\Migration;

/**
 * Class m230520_163143_payment
 */
class m230520_163143_payment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('transaction' , [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'order_id' => $this->integer()->notNull(),
            'order_info_id' => $this->integer()->notNull(),
            'insurance_line_id' => $this->integer(),
            'insurance_line_category_id' => $this->integer(),
            'status' => $this->integer()->notNull(),
            'payment_type_id' => $this->integer()->notNull(),
            'final_price' => $this->float(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer(),
        ]);


        $this->createTable('payment' , [
            'id' => $this->primaryKey(),
            'transaction_id' => $this->integer(),
            'user_id' => $this->integer(),
            'order_id' => $this->integer(),
            'order_info_id' => $this->integer(),
            'insurance_line_id' => $this->integer(),
            'insurance_line_category_id' => $this->integer(),
            'call_back_url' => $this->text(),
            'redirect_url' => $this->text(),
            'pm_status' => $this->integer(),
            'pm_call_back_status' => $this->integer(),
            'pm_token' => $this->text(),
            'pm_message' => $this->string(),
            'pm_ref_num' => $this->string(),
            'pm_order_id' => $this->string(),
            'pm_payment_amount' => $this->float(),
            'pm_response_json' => $this->text(),
            'pm_card_number' => $this->string(),
            'pm_transaction_id' => $this->string(),
            'pm_tracking_code' => $this->string(),
            'pm_ref_number' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer(),
        ]);



        $this->createTable('payment_verify' , [
            'id' => $this->primaryKey(),
            'payment_id' => $this->integer(),
            'status' => $this->integer(),
            'message' => $this->string(),
            'response_json' => $this->text(),
            'price' => $this->float(),
            'ref_num' => $this->string(),
            'card_number' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230520_163143_payment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230520_163143_payment cannot be reverted.\n";

        return false;
    }
    */
}
