<?php

use yii\db\Migration;

/**
 * Class m230430_150420_car_lookup
 */
class m230430_150420_car_lookup extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('vehicle_group' , [
            'id' => $this->primaryKey(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
        ]);

        $this->createTable('vehicle_use_type' , [
            'id' => $this->primaryKey(),
            'vehicle_group_id' => $this->integer(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
        ]);


        $this->createTable('vehicle_system' , [
            'id' => $this->primaryKey(),
            'vehicle_group_id' => $this->integer(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
        ]);


        $this->createTable('vehicle_kind' , [
            'id' => $this->primaryKey(),
            'vehicle_group_id' => $this->integer(),
            'vehicle_system_id' => $this->integer(),
            'cylinder_count' => $this->integer(),
            'passenger_count' => $this->integer(),
            'tonnage' => $this->float(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
            'vehicle_category_caption' => $this->string(),
            'vehicle_system_caption' => $this->string(),
        ]);



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230430_150420_car_lookup cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230430_150420_car_lookup cannot be reverted.\n";

        return false;
    }
    */
}
