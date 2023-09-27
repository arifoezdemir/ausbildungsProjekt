<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;
use Cake\Utility\Text;
use Cake\Datasource\Paginator;

class CarsController extends AppController
{
	public $paginate = [
		'limit' => 3,
		'order' => [
			'Cars.brand' => 'asc'
		]
	];

	public function initialize(): void
	{
		parent::initialize();
		$this->loadComponent('Paginator');
	}

	public function isAuthorized($user)
	{
		if ($user['role'] === 'admin') {
			return true;
		}
		if ($user['role'] === 'user') {
			if (in_array($this->request->getParam('action'), ['index', 'view', 'reserve'])) {
				return true;
			}
		}
		return false;
	}

	public function index()
	{
		$isAdmin = false;
		if ($this->Auth->user('role') === 'admin') {
			$isAdmin = true;
		}
		$cars = $this->paginate($this->Cars);
		$this->set(compact('cars', 'isAdmin'));
	}

	public function view($id = null)
	{
		$car = $this->Cars->get($id, ['contain' => ['Reservations']]);
		$isLoggedIn = $this->Auth->user();
		$isAdmin = $isLoggedIn && $this->Auth->user('role') === 'admin';
		$this->set(compact('car', 'isLoggedIn', 'isAdmin'));
	}

	public function add()
	{
		$car = $this->Cars->newEntity();
		if ($this->request->is('post')) {
			$car = $this->Cars->patchEntity($car, $this->request->getData());
			$imageFile = $this->request->getData('image');;
			if (!empty($imageFile) && is_array($imageFile) && isset($imageFile['tmp_name'])) {
				$imageName = Text::uuid() . '-' . $imageFile['name'];
				$imageFile['name'] = $imageName;
				$targetPath = WWW_ROOT . 'img/cars/' . $imageName;
				if (move_uploaded_file($imageFile['tmp_name'], $targetPath)) {
					$car->image = 'cars/' . $imageName;
				}
			}
			if ($this->Cars->save($car)) {
				$this->Flash->success(__('Gespeichert'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Hinzufügen nicht möglich'));
		}
		$this->set(compact('car'));
	}

	public function edit($id = null)
	{
		$car = $this->Cars->findById($id)->first();
		if (!$car) {
			throw new NotFoundException('Auto nicht gefunden');
		}
		if ($this->request->is(['post', 'put', 'patch'])) {
			$this->Cars->patchEntity($car, $this->request->getData());
			if ($this->Cars->save($car)) {
				$this->Flash->success('Erfolgreich geändert');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('Keine Berechtigung');
		}
		$this->set('car', $car);
	}

	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$car = $this->Cars->get($id);
		if ($this->Cars->delete($car)) {
			$this->Flash->success(__('Das Fahrzeug wurde gelöscht.'));
		} else {
			$this->Flash->error(__('Keine Berechtigung.'));
		}
		return $this->redirect(['action' => 'index']);
	}

	public function reserve($id)
	{
		$this->loadModel('Reservations');
		$isLoggedIn = $this->Auth->user();
		$car = $this->Cars->get($id);
		$reservation = $this->Reservations->newEntity();

		if ($this->request->is('post')) {
			$reservationData = $this->request->getData();
			$reservationData['car_id'] = $car->id;
			$reservationData['user_id'] = $this->Auth->user('id');
			$start_date = $this->request->getData('start_date');
			$end_date = $this->request->getData('end_date');
			$currentDate = new \DateTime();
			if (new \DateTime($start_date) < $currentDate) {
				$this->Flash->error(__('Das Startdatum darf nicht in der Vergangenheit liegen.'));
			} elseif ($this->Reservations->isCarAvailable($car->id, $start_date, $end_date)) {
				$reservationData['start_date'] = $start_date;
				$reservationData['end_date'] = $end_date;
				$reservation = $this->Reservations->patchEntity($reservation, $reservationData);
				if ($this->Reservations->save($reservation)) {
					$this->Flash->success(__('Das Auto wurde erfolgreich reserviert.'));
					return $this->redirect(['controller' => 'Cars', 'action' => 'view', $car->id]);
				} else {
					$this->Flash->error(__('Die Reservierung konnte nicht erstellt werden. Bitte versuche es erneut.'));
				}
			} else {
				$this->Flash->error(__('Das Auto ist in diesem Zeitraum bereits reserviert.'));
			}
		}
		$this->set(compact('car', 'reservation'));

		$this->set(compact('car', 'reservation'));
	}

	public function reservationsView()
	{
		$this->loadModel('Reservations');
		$this->paginate = [
			'limit' => 5,
			'order' => ['start_date' => 'ASC'],
			'contain' => ['Cars', 'Users'],
		];
		$reservations = $this->paginate($this->Reservations->find()
			->contain(['Cars', 'Users'])
			->order(['start_date' => 'ASC']));
		$this->set(compact('reservations'));
	}
}
