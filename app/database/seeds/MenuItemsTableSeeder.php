<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class MenuItemsTableSeeder extends Seeder {

	public function run() {
		$menuItem              = new Menuitem;
		$menuItem->name        = "Configuracion";
		$menuItem->level       = '1';
		$menuItem->parent_id   = '';
		$menuItem->url         = '#';
		$menuItem->description = 'Configuracion de Paseos y precios';
		$menuItem->save();
		$menuItem2              = new Menuitem;
		$menuItem2->name        = "Embarcaciones";
		$menuItem2->level       = '2';
		$menuItem2->parent_id   = $menuItem->id;
		$menuItem2->url         = 'PanelAdministrativo/boats';
		$menuItem2->description = 'Configuracion de Paseos y precios';
		$menuItem2->save();
		$menuItem2              = new Menuitem;
		$menuItem2->name        = "Tours";
		$menuItem2->level       = '2';
		$menuItem2->parent_id   = $menuItem->id;
		$menuItem2->url         = 'PanelAdministrativo/tours';
		$menuItem2->description = 'Configuracion de Paseos y precios';
		$menuItem2->save();
		$menuItem2              = new Menuitem;
		$menuItem2->name        = "Precios";
		$menuItem2->level       = '2';
		$menuItem2->parent_id   = $menuItem->id;
		$menuItem2->url         = 'PanelAdministrativo/prices';
		$menuItem2->description = 'Configuracion de Paseos y precios';
		$menuItem2->save();
		$menuItem              = new Menuitem;
		$menuItem->name        = "Reservas";
		$menuItem->level       = '1';
		$menuItem->parent_id   = '';
		$menuItem->url         = '#';
		$menuItem->description = 'Lo Referente a Reservas';
		$menuItem->save();
		$menuItem2              = new Menuitem;
		$menuItem2->name        = "Consultas";
		$menuItem2->level       = '2';
		$menuItem2->parent_id   = $menuItem->id;
		$menuItem2->url         = 'PanelAdministrativo/reservas';
		$menuItem2->description = 'Configuracion de Paseos y precios';
		$menuItem2->save();

	}

}