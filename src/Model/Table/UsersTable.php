<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
	public function initialize(array $config)
	{
		$this->addBehavior('Timestamp');
		$this->hasMany('Reservations', [
			'foreignKey' => 'user_id',
		]);
	}

	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmptyString('username', 'Username erforderlich')
			->notEmptyString('password', 'Password erdorderlich')
			->notEmptyString('role', 'Bitte eine Rolle auswählen')
			->add('role', 'inList', [
				'rule' => ['inList', ['admin', 'user']],
				'message' => 'Bitte eine Rolle auswählen'
			]);
		return $validator;
	}
}
