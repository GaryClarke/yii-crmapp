<?php

namespace app\models\customer;

use yii\db\ActiveRecord;

class CustomerRecord extends ActiveRecord {

    public static function tableName()
    {
        return 'customer';
    }


    /**
     * Validation
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['id', 'number'],
            ['name', 'required'],
            ['name', 'string', 'max' => 256],
            ['birth_date', 'date', 'format' => 'php:Y-m-d'],
            ['notes', 'safe']
        ];
    }
}