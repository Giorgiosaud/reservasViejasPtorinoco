<?php 
$I = new FunctionalTester($scenario);
$I->am('un desarrollador web');
$I->wantTo('ver si laravel se instalo correctamente');
$I->amOnPage('/');
$I->see('You have arrived');