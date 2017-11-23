<?php

use yii\db\Migration;

/**
 * Class m171122_204306_init_services_table
 */
class m171122_204306_init_services_table extends Migration {

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
        echo "m171122_204306_init_services_table cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('service', [
            'id'          => 'pk',
            'name'        => 'string unique',
            'hourly_rate' => 'integer'
        ]);
    }

    public function down()
    {
        $this->dropTable('service');
    }

}
