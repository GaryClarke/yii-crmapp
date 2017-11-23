<?php


namespace app\models\customer;


class Phone {

    /** @var string */
    public $number;


    /**
     * Phone Constructor
     *
     * @param $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }
}