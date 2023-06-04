<?php

use yii\db\Migration;

/**
 * Class m230516_204605_lookup_secound
 */
class m230516_204605_lookup_secound extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vehicle_fuel_type', [
            'id'=> $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->integer(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230516_204605_lookup_secound cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230516_204605_lookup_secound cannot be reverted.\n";

        return false;
    }
    */
}
