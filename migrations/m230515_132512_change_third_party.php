<?php

use yii\db\Migration;

/**
 * Class m230515_132512_change_third_party
 */
class m230515_132512_change_third_party extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        # order id delete shod
        $this->createTable('third_party_inquiry', [
            'id' => $this->primaryKey(),
            'fan_inquiry_id' => $this->integer(),
            'user_id' => $this->integer(),
            'status' => $this->integer(),
            'is_ownership_changed' => $this->integer(), // آیا در مدت بیمه‌نامه قبلی تغییر مالکیت خودرو (تعویض پلاک) داشته است؟
            'discount_history' => $this->string(), // سابقه تخفیف بیمه قبلی با مقادیر نه، با همین پلاک و پلاک دیگر
            'has_damage' =>  $this->integer(), // آیا خسارت گرفته از بیمه قبلی
            'other_discount_plaque_double_digit' => $this->integer(),
            'other_discount_plaque_triple_digit' => $this->integer(),
            'other_discount_plaque_iran_digit' => $this->integer(),
            'other_discount_plaque_letter_id' => $this->integer(),
            'other_discount_plaque_letter_caption' => $this->string(),
            'is_new_car' => $this->integer(),
            "has_spare" => $this->integer(),
            "spare_count" => $this->integer() ,
            "spare_plaque_date" => $this->string(),
            'is_in_free_region' => $this->integer(),
            'free_region_id' => $this->integer(),
            'life_cov' => $this->float(),
            'life_dmg_count' => $this->integer(),
            'life_final_extra_prm' => $this->float(),
            'driver_accidents_cov' => $this->float(),
            'driver_accidents_dmg_count' => $this->integer(),
            'driver_accidents_dmg_final_extra_prm' => $this->float(),
            'driver_accidents_wait_duration' => $this->float(),
            "final_fund_prm" => $this->float(), # صندوق
            "financial_cov" => $this->float(),
            "financial_dmg_count" => $this->integer(),
            "financial_final_extra_prm" => $this->float(),
            'plaque_date' =>  $this->string(),
            'plaque_kind_id' => $this->integer(),
            'plaque_sample_id' => $this->integer(),
            "policy_driver_accidents_duration" => $this->integer(),
            "policy_driver_accidents_percent" => $this->float(),
            "policy_third_party_duration" => $this->integer(),
            "policy_third_party_percent" => $this->float(),
            "previous_insurance_corp_id" => $this->integer(),
            "previous_policy_begin_date" => $this->string(),
            "previous_policy_discount_duration" => $this->integer(),
            "previous_policy_discount_percent" => $this->float(),
            "previous_policy_driver_accidents_discount_duration" => $this->integer(),
            "previous_policy_driver_accidents_discount_percent" =>  $this->float(),
            "previous_policy_end_date" =>   $this->string(),
            'begin_date' => $this->string(),
            "end_date" => $this->string(),
            'built_year' =>  $this->integer(),
            'calc_kind_id' => $this->integer(),
            'vehicle_kind_id'=> $this->integer(),
            'vehicle_group_id' => $this->integer(),
            'vehicle_system_id' => $this->integer(),
            'used_id'=>  $this->integer(),
            'tax' => $this->float(), # ماليات
            'total_premium' => $this->float(), # کل حق بيمه
            'toll' => $this->float(), # عوارض
            'third_party_waite_duration' => $this->float(),
            'third_party_final_prm' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);

        $this->createTable('third_party_detail', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'third_party_inquiry_id' => $this->integer()->notNull(),
            'owner_status_vehicle' => $this->integer()->null(),
            'owner_vehicle_melli_code' => $this->string()->null(),
            'owner_vehicle_hbd_date' => $this->string()->null(),
            'owner_vehicle_gender' => $this->integer()->null(),
            'owner_has_vehicle_insurance_body' => $this->integer(),
            'other_owner_vehicle_full_name' => $this->string(),
            'other_owner_vehicle_user_hbd_date' => $this->string(),
            'other_owner_vehicle_user_code' => $this->string(),
            'other_plaque_double_digit' => $this->integer(),
            'other_plaque_triple_digit' => $this->integer(),
            'other_plaque_iran_digit' => $this->integer(),
            'other_plaque_letter_id' => $this->integer(),
            'other_plaque_letter_caption' => $this->string(),
            'path_file_img_front_cart_vehicle' => $this->text(),
            'path_file_img_back_cart_vehicle' => $this->text(),
            'vehicle_motor_no' => $this->string()->null(),
            'vehicle_chassis_no' => $this->string()->null(),
            'vehicle_vin' => $this->string()->null(),
            'plaque_double_digit' => $this->integer()->null(),
            'plaque_triple_digit' => $this->integer()->null(),
            'plaque_iran_digit' => $this->integer()->null(),
            'plaque_letter_id' => $this->integer()->null(),
            'plaque_letter_caption' => $this->string()->null(),
            'email' => $this->string()->null(),
            'description' => $this->string()->null(),
            'mention_insurance_status_owner' => $this->integer()->null(),
            'relativity_to_person_transfer_id' => $this->integer(),
            'mention_insurance_call_number' => $this->string(),
            'other_mention_insurance_user_melli_code' => $this->string(),
            'other_mention_insurance_user_hbd_date' => $this->string(),
            'other_mention_insurance_user_gender' => $this->integer(),
            'mention_insurance_province_id' => $this->integer()->null(),
            'mention_insurance_city_id' => $this->integer()->null(),
            'mention_insurance_address' => $this->text()->null(),
            'mention_insurance_code_post' => $this->string()->null(),
            'status' => $this->integer()->null(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_by' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);

        #TODO: Third Party

        $this->createTable('third_party_detail_driver', [
            'id' => $this->primaryKey(),
            'third_party_detail_id' => $this->integer()->notNull(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'melli_code' => $this->string(),
            'certificate_code' => $this->string()->notNull(),
            'certificate_date' => $this->string()->notNull(),
            'path_certificate_image' => $this->text(),
            'status' => $this->integer(),
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
        echo "m230515_132512_change_third_party cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230515_132512_change_third_party cannot be reverted.\n";

        return false;
    }


    */


}
