<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('See that the landing page is up');

// WHEN
$I->amOnPage('/');

// THEN
$I->see('Our CRM');
