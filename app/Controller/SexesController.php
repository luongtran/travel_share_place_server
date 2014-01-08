<?php
App::uses('AppController', 'Controller');
/**
 * Sexes Controller
 *
 * @property Sex $Sex
 * @property PaginatorComponent $Paginator
 */
class SexesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        public function json(){
            $Sexes=  $this->Sex->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($Sexes));
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
		$this->Sex->recursive = 0;
		$this->set('sexes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sex->exists($id)) {
			throw new NotFoundException(__('Invalid sex'));
		}
		$options = array('conditions' => array('Sex.' . $this->Sex->primaryKey => $id));
		$this->set('sex', $this->Sex->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sex->create();
			if ($this->Sex->save($this->request->data)) {
				$this->Session->setFlash(__('The sex has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sex could not be saved. Please, try again.'));
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
		if (!$this->Sex->exists($id)) {
			throw new NotFoundException(__('Invalid sex'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sex->save($this->request->data)) {
				$this->Session->setFlash(__('The sex has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sex could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sex.' . $this->Sex->primaryKey => $id));
			$this->request->data = $this->Sex->find('first', $options);
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
		$this->Sex->id = $id;
		if (!$this->Sex->exists()) {
			throw new NotFoundException(__('Invalid sex'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Sex->delete()) {
			$this->Session->setFlash(__('The sex has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sex could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Sex->recursive = 0;
		$this->set('sexes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Sex->exists($id)) {
			throw new NotFoundException(__('Invalid sex'));
		}
		$options = array('conditions' => array('Sex.' . $this->Sex->primaryKey => $id));
		$this->set('sex', $this->Sex->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Sex->create();
			if ($this->Sex->save($this->request->data)) {
				$this->Session->setFlash(__('The sex has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sex could not be saved. Please, try again.'));
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
		if (!$this->Sex->exists($id)) {
			throw new NotFoundException(__('Invalid sex'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sex->save($this->request->data)) {
				$this->Session->setFlash(__('The sex has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sex could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sex.' . $this->Sex->primaryKey => $id));
			$this->request->data = $this->Sex->find('first', $options);
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
		$this->Sex->id = $id;
		if (!$this->Sex->exists()) {
			throw new NotFoundException(__('Invalid sex'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Sex->delete()) {
			$this->Session->setFlash(__('The sex has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sex could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
