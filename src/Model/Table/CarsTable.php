<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CarsTable extends Table
{
	public function initialize(array $config): void
	{
		parent::initialize($config);
		$this->setTable('cars');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');
		$this->addBehavior('Timestamp');
		$this->hasMany('Reservations', [
			'foreignKey' => 'car_id',
		]);
	}

	public function validationDefault(Validator $validator): Validator
	{
		$validator
			->notEmptyString('brand', 'Eine Marke ist erforderlich')
			->notEmptyString('model', 'Ein Modell ist erforderlich')
			->numeric('rental_price', 'Ein Preis ist erforderlich')
			->numeric('deposit', 'Eine Kaution ist erforderlich')
			->boolean('is_reserved')
			->notEmptyString('is_reserved');
		return $validator;
	}
}
