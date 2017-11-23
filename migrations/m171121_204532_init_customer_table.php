<?php

use yii\db\Migration;

/**
 * Class m171121_204532_init_customer_table
 */
class m171121_204532_init_customer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171121_204532_init_customer_table cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('customer', [
           'id' => 'pk',
            'name' => 'string',
            'birth_date' => 'date',
            'notes' => 'text'
        ], 'ENGINE=InnoDB');
    }


    public function down()
    {
        $this->dropTable('customer');
    }

}
