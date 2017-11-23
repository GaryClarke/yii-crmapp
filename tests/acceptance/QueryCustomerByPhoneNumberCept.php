<?php

use Step\Acceptance\CRMOperatorSteps;
use Step\Acceptance\CRMUserSteps;

$I = new CRMOperatorSteps($scenario);

// CRM operator scenario
$I->wantTo('add two different customers to database');

$I->amInAddCustomerUi();

$firstCustomer = $I->imagineCustomer();

$I->fillCustomerDataForm($firstCustomer);

$I->submitCustomerDataForm();

$I->seeIAmInListCustomersUi();

$I->amInListCustomersUi();

$secondCustomer = $I->imagineCustomer();

$I->fillCustomerDataForm($secondCustomer);

$I->submitCustomerDataForm();

$I->seeIAmInListCustomersUi();

// CRM user scenario
$I = new CRMUserSteps($scenario);

$I->wantTo('query the customer info using his phone number');

$I->amInQueryCustomerUi();

$I->fillInPhoneFieldWithDataFrom($firstCustomer);

$I->clickSearchButton();

$I->seeIAmInListCustomersUi();

$I->seeCustomerInList($firstCustomer);

$I->dontSeeCustomerInList($secondCustomer);