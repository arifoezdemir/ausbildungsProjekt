<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Car extends Entity
{
	public $validate = array(
		'brand' => array(
			'rule' => 'notEmpty',
			'message' => 'Bitte geben Sie eine Marke ein'
		),
		'model' => array(
			'rule' => 'notEmpty',
			'message' => 'Bitte geben Sie ein Modell ein'
		),
		'rental_price' => array(
			'rule' => 'numeric',
			'message' => 'Der Preis muss eine Zahl sein'
		),
		'deposit' => array(
			'rule' => 'numeric',
			'message' => 'Die Kaution muss eine Zahl sein'
		),
	);
}
