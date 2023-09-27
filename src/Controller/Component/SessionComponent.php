<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

class SessionComponent extends Component {

    public function initialize(array $config) {
        parent::initialize($config);
    }

    public function write($key, $value) {
        $this->_registry->getController()->getRequest()->getSession()->write($key, $value);
    }

    public function read($key) {
        return $this->_registry->getController()->getRequest()->getSession()->read($key);
    }

    public function delete($key) {
        $this->_registry->getController()->getRequest()->getSession()->delete($key);
    }
}