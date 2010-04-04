<?php
class InformationController extends AppController {

	var $name = 'Information';
	var $components = array('Session');
	var $helpers = array('Html', 'Form', 'Javascript', 'Session');

	function index() {
		$this->Information->recursive = 0;
		$this->set('information', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'information'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('information', $this->Information->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Information->create();
			if ($this->Information->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'information'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'information'));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'information'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Information->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'information'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'information'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Information->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'information'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Information->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Information'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Information'));
		$this->redirect(array('action' => 'index'));
	}
}
?>