<?php

use Migrations\AbstractMigration;

class CreateReservations extends AbstractMigration
{
	public function change()
	{
		$table = $this->table('reservations');
		$table->addColumn('user_id', 'integer')
			->addColumn('car_id', 'integer')
			->addColumn('start_date', 'date')
			->addColumn('end_date', 'date')
			->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
			->addIndex(['user_id', 'car_id'])
			->create();
	}
}
