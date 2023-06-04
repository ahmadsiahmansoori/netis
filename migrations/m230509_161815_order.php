<?php

use yii\db\Migration;

/**
 * Class m230509_161815_order
 */
class m230509_161815_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {




//
//        $this->createTable('order' , [
//            'id' => $this->primaryKey(),
//            'user_id' => $this->integer(),
//            'category_id' => $this->integer(),
//            'status' => $this->integer(),
//            'fan_inquiry_id' => $this->integer()->notNull(),
//            'fan_customer_id' => $this->integer(),
//            'created_at' => $this->integer(),
//            'updated_at' => $this->integer(),
//        ]);
//
//
//
//
//
//
//        $this->createTable('third_party' , [
//            'id' => $this->primaryKey(),
//
//            'order_id' => $this->integer(),
//            'user_id' => $this->integer(),
//            'status' => $this->integer(),
//
//            'fan_inquiry_id' => $this->integer()->notNull(),
//            'fan_customer_id' => $this->integer(),
//
//
//            'complete_date_id' => $this->integer(),
//
//            'owner_vehicle_id' => $this->integer(),
//            'owner_vehicle_melli_code' => $this->string(),
//            'owner_vehicle_hbd_date' => $this->string(),
//            'owner_vehicle_gender' => $this->integer(),
//            'owner_has_vehicle_insurance_body' => $this->integer(),
//
//            'other_owner_vehicle_melli_code' => $this->string(),
//            'other_owner_vehicle_hbd_date' => $this->string(),
//            'other_owner_name' => $this->string(),
//
//
//
//
//            'motor_no' => $this->string(),
//            'chassis_no' => $this->string(),
//            'vehicle_vin' => $this->string(),
//
//            'vehicle_used_id' => $this->integer(),
//            'vehicle_group_id' => $this->integer(),
//            'vehicle_kind_id' => $this->integer(),
//            'vehicle_system_id' => $this->integer(),
//            'vehicle_built_year' => $this->integer(),
//            'response_inquiry' => $this->text(), # response third party insurance ( inquiry )
//            'insurance_crop_id' => $this->integer(),
//            'plaque_date' => $this->string(),
//            'plaque_kind_id' =>  $this->integer(),
//            'previous_policy_begin_date' => $this->string(),
//            'previous_policy_end_date' => $this->string(),
//            'previous_policy_discount_duration' => $this->string(),
//            'previous_policy_discount_percent' => $this->string(),
//            'previous_policy_driver_accidents_discount_duration' => $this->string(),
//            'previous_policy_driver_accidents_discount_percent' => $this->string(),
//            'financial_dmg_count' => $this->integer(),
//            'life_dmg_count' => $this->integer(),
//            'driver_accidents_dmg_count' => $this->integer(),
//
//
//            # understand
//            'is_owner_ship_changed' => $this->integer(),
//            'discount_history' =>$this->string(),
//
//
//
//            'path_file_img_front_cart_vehicle' => $this->text(),
//            'path_file_img_back_cart_vehicle' => $this->text(),
//
//
//
//            'mention_owner_insurance' => $this->integer(),
//            'relativity_to_person_transfer_id' => $this->integer(),
//            'owner_insurance_call_number' => $this->string(),
//            'owner_insurance_melli_code' => $this->string(),
//            'owner_insurance_hbd_date' => $this->string(),
//            'mention_insurance_province_id' => $this->integer(),
//            'mention_insurance_city_id' => $this->integer(),
//            'mention_insurance_address' => $this->text(),
//            'mention_insurance_code_post' => $this->string(),
//            'owner_insurance_gender' => $this->integer(),
//
//            'plaque_double_digit' => $this->integer(),
//            'plaque_triple_digit' => $this->integer(),
//            'plaque_iran_digit' => $this->integer(),
//            'plaque_letter_id' => $this->integer(),
//            'plaque_letter_caption' => $this->string(),
//
//            'email' => $this->string(),
//            'description' => $this->string(),
//
//            'total_premium' => $this->float(),
//            'life_final_extra_prm' => $this->float(),
//            'financial_final_extra_prm' => $this->float(),
//            'third_party_final_prm' => $this->float(),
//            'final_fund_prm' => $this->float(),
//            'driver_accidents_dmg_final_extra_prm' => $this->float(),
//            'tax' => $this->float(),
//            'toll' => $this->float(),
//
//            'created_at' => $this->integer(),
//            'updated_at' => $this->integer(),
//        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230509_161815_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230509_161815_order cannot be reverted.\n";

        return false;
    }
    */
}
