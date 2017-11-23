<?php

use yii\db\Migration;

/**
 * Class m171121_204624_init_phone_table
 */
class m171121_204624_init_phone_table extends Migration {

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
        echo "m171121_204624_init_phone_table cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('phone', [
            'id'          => 'pk',
            'customer_id' => 'int unique',
            'number'      => 'string'
        ], 'ENGINE=InnoDB');

        $this->addForeignKey('customer_phone_numbers', 'phone', 'customer_id', 'customer', 'id');
    }


    public function down()
    {
        $this->dropForeignKey('customer_phone_numbers', 'phone');

        $this->dropTable('phone');
    }

}
