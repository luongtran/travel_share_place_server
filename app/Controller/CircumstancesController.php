<?php

App::uses('AppController', 'Controller');

/**
 * Circumstances Controller
 *
 * @property Circumstance $Circumstance
 * @property PaginatorComponent $Paginator
 */

class CircumstancesController extends AppController {
    /*
     * 1    
     *       */
    public $uses=array('Circumstance','ID3');
   
    
    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = array('Html');

    public function json() {
        
        $Circumstances = $this->Circumstance->find('all');
        $this->layout = NULL;
        $this->autoRender = FALSE;
        $this->response->type('json');
        $this->response->body(json_encode($Circumstances));
    }
   

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        
        $this->Circumstance->recursive = 0;
        $this->set('circumstances', $this->Paginator->paginate());
    }
    
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Circumstance->exists($id)) {
            throw new NotFoundException(__('Invalid circumstance'));
        }
        $options = array('conditions' => array('Circumstance.' . $this->Circumstance->primaryKey => $id));
        $this->set('circumstance', $this->Circumstance->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Circumstance->create();
            if ($this->Circumstance->save($this->request->data)) {
                $this->Session->setFlash(__('The circumstance has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The circumstance could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Circumstance->exists($id)) {
            throw new NotFoundException(__('Invalid circumstance'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Circumstance->save($this->request->data)) {
                $this->Session->setFlash(__('The circumstance has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The circumstance could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Circumstance.' . $this->Circumstance->primaryKey => $id));
            $this->request->data = $this->Circumstance->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Circumstance->id = $id;
        if (!$this->Circumstance->exists()) {
            throw new NotFoundException(__('Invalid circumstance'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Circumstance->delete()) {
            $this->Session->setFlash(__('The circumstance has been deleted.'));
        } else {
            $this->Session->setFlash(__('The circumstance could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Circumstance->recursive = 0;
        $this->set('circumstances', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Circumstance->exists($id)) {
            throw new NotFoundException(__('Invalid circumstance'));
        }
        $options = array('conditions' => array('Circumstance.' . $this->Circumstance->primaryKey => $id));
        $this->set('circumstance', $this->Circumstance->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Circumstance->create();
            if ($this->Circumstance->save($this->request->data)) {
                $this->Session->setFlash(__('The circumstance has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The circumstance could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Circumstance->exists($id)) {
            throw new NotFoundException(__('Invalid circumstance'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Circumstance->save($this->request->data)) {
                $this->Session->setFlash(__('The circumstance has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The circumstance could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Circumstance.' . $this->Circumstance->primaryKey => $id));
            $this->request->data = $this->Circumstance->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Circumstance->id = $id;
        if (!$this->Circumstance->exists()) {
            throw new NotFoundException(__('Invalid circumstance'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Circumstance->delete()) {
            $this->Session->setFlash(__('The circumstance has been deleted.'));
        } else {
            $this->Session->setFlash(__('The circumstance could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}

// algorithms ID3
class DicisionTree{
    
}        