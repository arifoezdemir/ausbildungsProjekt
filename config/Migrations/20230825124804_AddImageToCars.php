<?php

use Migrations\AbstractMigration;

class AddImageToCars extends AbstractMigration
{
	public function change()
	{
		$table = $this->table('cars');
		$table->addColumn('image', 'string', [
			'default' => null,
			'null' => true,
		]);
		$table->update();
	}
}
