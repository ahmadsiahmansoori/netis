<?php

use yii\db\Migration;

/**
 * Class m230502_162410_common
 */
class m230502_162410_common extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('insurance_corp' , [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->integer(),
        ]);

        $this->createTable('insurance_line_category' , [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->integer(),
        ]);



        $this->createTable('insurance_line' , [
            'id' => $this->primaryKey(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
        ]);



        $this->createTable('insurance_final_status' , [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->integer(),
        ]);


        $this->createTable('dmg_case_type' , [
            'id' => $this->primaryKey(),
            'name'  => $this->string(),
            'insurance_line_id' => $this->integer()
        ]);


            $this->createTable('countries' , [
            'id' => $this->primaryKey(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
            'is_exempt_applying_visa' => $this->integer(),
            'nationality' => $this->string(),
        ]);


        $this->createTable('provinces' , [
            'id' => $this->primaryKey(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
        ]);


        $this->createTable('cites' , [
            'id' => $this->primaryKey(),
            'province_id' => $this->integer(),
            'is_in_free_region' => $this->integer(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
        ]);

        $this->createTable('areas' , [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
        ]);


        $this->createTable('calc_kind' , [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->integer(),
        ]);


        $this->createTable('is_ans' , [
            'id' => $this->integer(),
            'name' => $this->string(),
            'active' => $this->integer(),
        ]);

        $this->createTable('is_has', [
            'id' => $this->integer(),
            'name' => $this->string(),
            'active' => $this->integer(),
        ]);


        $this->createTable('losses_history', [
            'id' => $this->primaryKey(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
        ]);

        $this->createTable('additional_cov' , [
            'id' => $this->primaryKey(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'is_online_sale' => $this->integer(),
            'active' => $this->integer(),
        ]);

        $this->createTable('basic_cov' , [
            'id' => $this->primaryKey(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'is_online_sale' => $this->integer(),
            'active' => $this->integer(),
        ]);


        $this->createTable('vehicle_hull_discounts' , [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'from_date' => $this->string(),
            'to_date' => $this->string(),
            'active' => $this->integer(),
        ]);




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230502_162410_common cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230502_162410_common cannot be reverted.\n";

        return false;
    }
    */
}
