<?php
App::uses('AppController', 'Controller');
/**
 * Decentralizations Controller
 *
 * @property Decentralization $Decentralization
 * @property PaginatorComponent $Paginator
 */
class DecentralizationsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        public function json(){
            $Decentralizations=  $this->Decentralization->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($Decentralizations));
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
		$this->Decentralization->recursive = 0;
		$this->set('decentralizations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Decentralization->exists($id)) {
			throw new NotFoundException(__('Invalid decentralization'));
		}
		$options = array('conditions' => array('Decentralization.' . $this->Decentralization->primaryKey => $id));
		$this->set('decentralization', $this->Decentralization->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Decentralization->create();
			if ($this->Decentralization->save($this->request->data)) {
				$this->Session->setFlash(__('The decentralization has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The decentralization could not be saved. Please, try again.'));
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
		if (!$this->Decentralization->exists($id)) {
			throw new NotFoundException(__('Invalid decentralization'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Decentralization->save($this->request->data)) {
				$this->Session->setFlash(__('The decentralization has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The decentralization could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Decentralization.' . $this->Decentralization->primaryKey => $id));
			$this->request->data = $this->Decentralization->find('first', $options);
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
		$this->Decentralization->id = $id;
		if (!$this->Decentralization->exists()) {
			throw new NotFoundException(__('Invalid decentralization'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Decentralization->delete()) {
			$this->Session->setFlash(__('The decentralization has been deleted.'));
		} else {
			$this->Session->setFlash(__('The decentralization could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Decentralization->recursive = 0;
		$this->set('decentralizations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Decentralization->exists($id)) {
			throw new NotFoundException(__('Invalid decentralization'));
		}
		$options = array('conditions' => array('Decentralization.' . $this->Decentralization->primaryKey => $id));
		$this->set('decentralization', $this->Decentralization->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Decentralization->create();
			if ($this->Decentralization->save($this->request->data)) {
				$this->Session->setFlash(__('The decentralization has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The decentralization could not be saved. Please, try again.'));
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
		if (!$this->Decentralization->exists($id)) {
			throw new NotFoundException(__('Invalid decentralization'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Decentralization->save($this->request->data)) {
				$this->Session->setFlash(__('The decentralization has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The decentralization could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Decentralization.' . $this->Decentralization->primaryKey => $id));
			$this->request->data = $this->Decentralization->find('first', $options);
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
		$this->Decentralization->id = $id;
		if (!$this->Decentralization->exists()) {
			throw new NotFoundException(__('Invalid decentralization'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Decentralization->delete()) {
			$this->Session->setFlash(__('The decentralization has been deleted.'));
		} else {
			$this->Session->setFlash(__('The decentralization could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
