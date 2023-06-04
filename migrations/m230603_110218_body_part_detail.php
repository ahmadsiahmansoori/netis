<?php

use yii\db\Migration;

/**
 * Class m230603_110218_body_part_detail
 */
class m230603_110218_body_part_detail extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {




        $this->createTable('body_party_detail' , [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'body_party_inquiry_id' => $this->integer(),
            'status' => $this->integer(),
            "path_image_cart_front_vehicle" => $this->text(),
            "path_image_cart_back_vehicle" => $this->text(),
            "owner_insurance_status" => $this->integer(),
            "owner_code_melli" => $this->string(),
            'owner_gender' => $this->string(),
            "owner_hbd_date" => $this->string(),
            "owner_province_id" => $this->integer(),
            "owner_city_id" => $this->integer(),
            "owner_address" => $this->text(),
            "owner_first_name" => $this->string(),
            "owner_last_name" => $this->string(),
            "owner_call_number" => $this->string(),


            "place_visit_vehicle_type" => $this->integer(),

            'place_visit_location_vendor_id' => $this->integer(),
            "place_visit_location_vehicle_province_id" => $this->integer(),
            "place_visit_location_vehicle_city_id" => $this->integer(),
            'place_visit_location_address' => $this->text(),
            'place_visit_location_call_number' => $this->string(),
            'place_visit_location_postal_code' => $this->string(),

            'location_user_address_id' => $this->integer(),
            'email' => $this->string(),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);


        $this->createTable('vendor_insurance_company' , [
            'id' => $this->primaryKey(),
            'vendor_name' => $this->string(),
            'province' => $this->integer(),
            'city' => $this->integer(),
            'address' => $this->text(),
            'phone' => $this->string(),
            'fax_number' => $this->string(),
            'call_number' => $this->string(),
            'status' => $this->integer(),
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

        $this->dropTable('body_part_detail');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230603_110218_body_part_detail cannot be reverted.\n";

        return false;
    }
    */
}
