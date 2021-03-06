<?php

class TeammembersController extends AppController {

    var $name = 'Teammembers';
    var $components = array('Session');

    function index() {
        $this->Teammember->recursive = 0;
        $this->set('teammembers', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(sprintf(__('Invalid %s', true), __('Teammember', true)));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('teammember', $this->Teammember->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Teammember->create();
            if ($this->Teammember->save($this->data, array('fieldList' => $this->Teammember->fields['save']))) {
                $this->Session->setFlash(sprintf(__('The %s has been saved', true), __('Teammember', true)));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), __('Teammember', true)));
            }
        }
        $teams = $this->Teammember->Team->find('list');
        $users = $this->Teammember->User->find('list');
        $this->set(compact('teams', 'users'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(sprintf(__('Invalid %s', true), __('Teammember', true)));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Teammember->save($this->data, array('fieldList' => $this->Teammember->fields['save']))) {
                $this->Session->setFlash(sprintf(__('The %s has been saved', true), __('Teammember', true)));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), __('Teammember', true)));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Teammember->read(null, $id);
        }
        $teams = $this->Teammember->Team->find('list');
        $users = $this->Teammember->User->find('list');
        $this->set(compact('teams', 'users'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(sprintf(__('Invalid id for %s', true), __('Teammember', true)));
            $this->redirect(array('action' => 'index'));
        }
        $this->Teammember->delete($id);
        $this->Session->setFlash(sprintf(__('%s deleted', true), __('Teammember', true)));
        $this->redirect(array('action' => 'index'));
    }

}

?>