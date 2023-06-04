<?php

use yii\db\Migration;

/**
 * Class m230530_105726_lookupBodyPart
 */
class m230530_105726_lookupBodyPart extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('accessory_type' , [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->integer(),
        ]);



        $this->createTable('accessory_kind' , [
            'id' => $this->primaryKey(),
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
        echo "m230530_105726_lookupBodyPart cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230530_105726_lookupBodyPart cannot be reverted.\n";

        return false;
    }
    */
}
