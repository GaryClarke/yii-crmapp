<?php
use Step\Acceptance\CRMUserSteps;

$I = new CRMUserSteps($scenario);


$I->wantTo('see whether user documentation is accessible');

$I->amOnPage('/site/docs');

$I->see('Documentation', 'h1');
$I->seeLargeBodyOfText();
dump($I); die;

