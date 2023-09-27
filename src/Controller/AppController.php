<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Event\EventInterface;
use Cake\I18n\I18n;

class AppController extends Controller
{
	public function error()
	{
		$this->set('errorMessage', 'Es ist ein Fehler aufgetreten.');
		$this->render('/Error/error');
	}

	public function beforeFilter(Event $event)
	{
		$this->Auth->allow(['index', 'view']);
	}

	public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
		$this->loadComponent('Auth', [
			'authenticate' => [
				'Form' => [
					'fields' => [
						'username' => 'username',
						'password' => 'password'
					]
				]
			],
			'loginAction' => [
				'controller' => 'Users',
				'action' => 'login'
			],
			'logoutRedirect' => [
				'controller' => 'Users',
				'action' => 'login'
			],
			'authorize' => 'Controller'
		]);
		$this->Auth->allow(['display']);

		$this->set('loggedInUser', $this->Auth->user());

		if (!empty($this->request->session()->read('I18n.Locale'))) {
			I18n::setLocale($this->request->session()->read('I18n.Locale'));
		}
	}

	public function isAuthorized($user)
	{
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}
		if (isset($user['role']) && $user['role'] === 'user' && in_array($this->request->getParam('action'), ['action1', 'action2'])) {
			return true;
		}
		return false;
	}
}
