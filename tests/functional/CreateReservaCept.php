<?php
$I = new FunctionalTester($scenario);
$I->am('Un Cliente de Puertorinoco');
$I->wantTo('Crear una nueva Reserva');
$I->amOnPage('reserva');
$I->see('Reservas On-Line', 'legend');
$today = date('Y-m-d H:i:s');
$I->fillField('fecha', $today);
$I->selectOption('Boat', 'Catamaran');
$I->selectOption('hora', '1');
$I->selectOption('rifInicio', 'V');
$I->fillField('identification', '17762267');
