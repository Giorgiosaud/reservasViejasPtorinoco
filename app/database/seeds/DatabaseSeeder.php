<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Eloquent::unguard();
		$this->call('UsersTableSeeder');
		$this->call('AccesslevelsTableSeeder');
		$this->call('VariablesTableSeeder');
		$this->call('SpecialdatesTableSeeder');
		$this->call('ToursTableSeeder');
		$this->call('PricesTableSeeder');
		$this->call('BoatsTableSeeder');
		$this->call('PaymentstatusTableSeeder');
		$this->call('PaymenttypesTableSeeder');
		$this->call('ClientsTableSeeder');
		$this->call('ReservationsTableSeeder');
		$this->call('PassengersTableSeeder');
		$this->call('PaymentsTableSeeder');
		$this->call('ToursBoatRelationTableSeeder');
		$this->call('PriceTourTableSeeder');
		$this->call('MenuItemsTableSeeder');

	}

}
