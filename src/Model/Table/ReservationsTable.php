<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ReservationsTable extends Table
{
	public function initialize(array $config): void
	{
		parent::initialize($config);
		$this->setTable('reservations');
		$this->addBehavior('Timestamp');
		$this->belongsTo('Cars', [
			'foreignKey' => 'car_id',
			'joinType' => 'INNER',
		]);
		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
			'joinType' => 'INNER',
		]);
	}

	public function validationDefault(Validator $validator): Validator
	{
		$validator
			->notEmptyDate('start_date', 'Bitte wählen Sie ein Startdatum.')
			->notEmptyDate('end_date', 'Bitte wählen Sie ein Enddatum.');
		return $validator;
	}

	public function isCarAvailable($carId, $startDate, $endDate)
	{
		$existingReservations = $this->find()
			->where([
				'car_id' => $carId,
				'start_date <=' => $endDate,
				'end_date >=' => $startDate
			])
			->count();
		return $existingReservations === 0;
	}
}
