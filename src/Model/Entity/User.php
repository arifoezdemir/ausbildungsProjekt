<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
	protected $_accessible = [ // phpcs:ignore PSR2.Classes.PropertyDeclaration.Underscore
		'*' => true,
		'id' => false,
	];

	protected function _setPassword($password) // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore
	{
		return (new DefaultPasswordHasher())->hash($password);
	}
}
