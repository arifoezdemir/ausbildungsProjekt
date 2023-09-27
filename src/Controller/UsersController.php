<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Event\EventInterface;
use Cake\I18n\I18n;

class UsersController extends AppController
{
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['add', 'login', 'logout', 'changeLanguage']);
	}

	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				if ($user['role'] === 'admin') {
					return $this->redirect(['controller' => 'Cars', 'action' => 'index']);
				} elseif ($user['role'] === 'user') {
					return $this->redirect(['controller' => 'Cars', 'action' => 'index']);
				}
			}
			$this->Flash->error(__('Falsche Logindaten, bitte erneut versuchen'));
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

	public function add()
	{
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {
				$this->Flash->success(__('Der User wurde gespeichert'));
				return $this->redirect(['action' => 'login']);
			}
			$this->Flash->error(__('Leider konnte der User nicht hinzugefügt werden'));
		}
		$this->set(compact('user'));
	}

	public function index()
	{
		$users = $this->paginate($this->Users);
		$this->set(compact('users'));

		$isLoggedIn = $this->Auth->user();

		$isAdmin = $isLoggedIn && $this->Auth->user('role') === 'admin';
		$this->set(compact('isAdmin', 'isLoggedIn'));
	}

	public function isAuthorized($user)
	{
		if ($this->request->getParam('action') === 'index') {
			return true;
		}
		if ($user['role'] === 'user') {
			return false;
		}
		if ($user['role'] === 'admin') {
			return true;
		}
		return false;
	}

	public function changeLanguage($language)
	{
		$supportedLanguages = ['de_DE', 'en_US', 'es_ES'];
		if (in_array($language, $supportedLanguages)){
			$this->request->session()->write('I18n.Locale', $language);
			return $this->redirect($this->referer());
		}else{
			$this->Flash->error(__('Die Sprache ist nicht verfügbar'));
			return $this->redirect($this->referer());
		}
	}
}
