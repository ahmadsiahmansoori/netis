<?php

use yii\db\Migration;

/**
 * Class m230515_083237_body_part
 */
class m230515_083237_body_part extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('body_part_inquiry' , [
            'id' => $this->primaryKey(),

            'vehicle_kind_id' => $this->integer(),
            'vehicle_group_id' => $this->integer(),
            'vehicle_system_id' => $this->integer(),
            'vehicle_fuel_type_id' => $this->integer(),
            'used_id' => $this->integer(),

            'is_in_free_region' => $this->integer(),
            'free_region_id' => $this->integer(),
            'province_id' => $this->integer(),

            'has_body_party_insurance_history' => $this->integer(),
            'basic_loss_history_id' => $this->integer(), # سابقه خطرات اصلی
            'additional_loss_history_id' => $this->integer(), # سابقه خطرات اضافی
            'previous_insurance_corp_id' => $this->integer(),
            'previous_policy_begin_date' => $this->string(),
            'previous_policy_end_date' => $this->string(),

            'is_new_car' => $this->integer(),
            'plaque_date' => $this->string(),

            'has_third_party_insurance_history' => $this->integer(),
            'insurance_discount_third_party' => $this->string(),
            'insurance_third_party_corp_id' => $this->integer(),

            'has_non_fabric' => $this->integer(),
            'vehicle_non_fabric_value' => $this->float(),

            'fan_inquiry_id' => $this->integer(),
            'user_id' => $this->integer(),
            'status' => $this->integer(),
            'driver_type_id' => $this->integer(),
            'plaque_kind_id' => $this->integer(),
            'plaque_sample_id' => $this->integer(),
            'built_year' => $this->string(),
            'request_km' => $this->integer(),
            'vehicle_value' => $this->float(),
            'basic_cov_id' => $this->integer(), # پوشش خطرات اصلی
            'transportation_prm' => $this->float(), # حق ایاب و ذهاب / هزینه توقف
            'instealing_prm' => $this->float(), # حق بیمه سرقت درجا
            'glass_breaking_prm' => $this->float(), # حق بیمه شکست شیشه به تنهایی
            'flood_earthquake_prm' => $this->float(), # حق بیمه سیل و زلزله
            'splash_painting_prm' => $this->float(), # حق بیمه پاشیدن رنگ
            'note_ten_prm' => $this->float(), # نوسانات قیمت
            'accessory_basic_risk_prm' => $this->float() ,  # حق بیمه خطرات اصلی لوازم اضافی
            'op_unit_id' => $this->integer(), # واحد صدور
            'toll' => $this->float(),
            'tax' => $this->float(),
            'total_premium' => $this->float(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);


        #  items other not fabric
        $this->createTable('body_part_inquiry_other_non_fabric' , [
            'id' => $this->primaryKey(),
            'body_part_inquiry_id' => $this->integer()->notNull(),
            'accessory_kind_id' => $this->integer()->notNull(),
            'caption' => $this->string()->null(),
            'price' => $this->float()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);


        # لیست پوشش ها
        $this->createTable('body_part_inquiry_additional_cov' , [
            'id' => $this->primaryKey(),
            'body_part_inquiry_id' => $this->integer()->notNull(),
            'cov_kind_id' => $this->integer(), # نوع پوشش
            'cov_rate_id' => $this->integer(), # نرخ پوشش
            'daily_commitment_amount' => $this->float(), # میزان تعهد روزانه
            'dmg_effective_percent' => $this->float(), # درصد موثر در خسارت
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);


        # تخفیفات
        $this->createTable('body_part_inquiry_discounts' , [
            'id' => $this->primaryKey(),
            'body_part_inquiry_id' => $this->integer()->notNull(),
            'discount_id' => $this->integer(), # تخفیف
            'other_discount_id' => $this->integer(), # سایر تخفیفات و اضافات
            'rate' => $this->float(), # نرخ تخفیف
            'personnel_id' => $this->integer(), # کد داخلی پرسنل
            'cov_rate' => $this->float(),  # نرخ پوشش اضافی
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'delete_mode' => $this->integer(),
        ]);



//
//        $this->createTable('body_part_detail' ,[
//            'id' => $this->primaryKey(),
//            'path_file_img_front_cart_vehicle' => $this->text(),
//            'path_file_img_back_cart_vehicle' => $this->text(),
//            'is_buy_owner_insurance' => $this->integer(),
//            'full_name' => $this->string(),
//            'melli_code' => $this->string(),
//            'gender' => $this->integer(),
//            'hbd_date' => $this->string(),
//            'call_number' => $this->string(),
//            'province_id' => $this->integer(),
//            'city_id' => $this->integer(),
//            'address' => $this->integer(),
//        ]);



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230515_083237_body_part cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230515_083237_body_part cannot be reverted.\n";

        return false;
    }
    */
}
