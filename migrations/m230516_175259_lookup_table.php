<?php

use yii\db\Migration;

/**
 * Class m230516_175259_lookup_table
 */
class m230516_175259_lookup_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('driver_type' , [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->integer(),
        ]);



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230516_175259_lookup_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230516_175259_lookup_table cannot be reverted.\n";

        return false;
    }
    */
}
