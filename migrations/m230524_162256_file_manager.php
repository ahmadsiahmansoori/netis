<?php

use yii\db\Migration;

/**
 * Class m230524_162256_file_manager
 */
class m230524_162256_file_manager extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        $this->createTable('manager_file' , [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'path' => $this->text()->notNull(),
            'link' => $this->string(),
            'insurance_line' => $this->integer(),
            'tag' => $this->string(),
            'name' => $this->string(),
            'description' => $this->text(),
            'status' => $this->integer(),
            'extension' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230524_162256_file_manager cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230524_162256_file_manager cannot be reverted.\n";

        return false;
    }
    */
}
