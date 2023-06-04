<?php

use yii\db\Migration;

/**
 * Class m230503_084925_plaque
 */
class m230503_084925_plaque extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('plaque_kind' , [
            'id' => $this->primaryKey(),
            'vehicle_group_id' => $this->integer(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
        ]);


        $this->createTable('plaque_letter' , [
            'id' => $this->primaryKey(),
            'letter_plaque_code' => $this->string(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
        ]);

        $this->createTable('plaque_design' , [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->integer(),
        ]);

        $this->createTable('plaque_sample' , [
            'id' => $this->primaryKey(),
            'plaque_design_id' => $this->integer(),
            'plaque_kind_id' => $this->integer(),
            'plaque_format' => $this->string(),
            'plaque_serial' => $this->string(),
            'plaque_sample' => $this->string(),
            'name_fa' => $this->string(),
            'name_en' => $this->string(),
            'active' => $this->integer(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230503_084925_plaque cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230503_084925_plaque cannot be reverted.\n";

        return false;
    }
    */
}
