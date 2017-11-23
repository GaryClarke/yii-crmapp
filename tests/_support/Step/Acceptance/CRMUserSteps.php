<?php

namespace Step\Acceptance;

class CRMUserSteps extends \AcceptanceTester
{
    function amInQueryCustomerUi()
    {
        $I = $this;
        $I->amOnPage('/customers/query');
    }


    function fillInPhoneFieldWithDataFrom($customerData)
    {
        $I = $this;

        $I->fillField('PhoneRecord[number]', $customerData['PhoneRecord[number]']);
    }


    function clickSearchButton()
    {
        $I = $this;

        $I->click('Search');
    }


    function seeIAmInListCustomersUi()
    {
        $I = $this;

        $I->seeCurrentUrlMatches('/customers/');
    }


    function seeCustomerInList($customerData)
    {
        $I = $this;
        
        $I->see($customerData['CustomerRecord[name]'], '#search_results');
    }
    
    
    function dontSeeCustomerInList($customerData)
    {
        $I = $this;

        $I->dontSee($customerData['CustomerRecord[name]'], '#search_results');
    }


    function seeLargeBodyOfText()
    {
        $I->this;

        $text = $I->grabTextFrom('p');

        $I->seeContentIsLong($text);
    }
}