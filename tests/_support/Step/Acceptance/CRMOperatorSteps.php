<?php

namespace Step\Acceptance;

use Faker\Factory;

class CRMOperatorSteps extends \AcceptanceTester {

    function amInAddCustomerUi()
    {
        $I = $this;
        $I->amOnPage('/customers/add');
    }


    function imagineCustomer()
    {
        $faker = Factory::create();

        return [
            'CustomerRecord[name]'       => $faker->name,
            'CustomerRecord[birth_date]' => $faker->date('Y-m-d'),
            'CustomerRecord[notes]'      => $faker->sentence(8),
            'PhoneRecord[number]'        => $faker->phoneNumber,
        ];
    }


    function fillCustomerDataForm($fieldsData)
    {
        $I = $this;

        foreach ($fieldsData as $field => $value)
        {
            $I->fillField($field, $value);
        }
    }


    function submitCustomerDataForm()
    {
        $I = $this;

        $I->click('Submit');
    }


    function seeIAmInListCustomersUi()
    {
        $I = $this;

        $I->seeCurrentUrlMatches('/customers/');
    }


    function amInListCustomersUi()
    {
        $I = $this;
        $I->amOnPage('/customers');
    }

}