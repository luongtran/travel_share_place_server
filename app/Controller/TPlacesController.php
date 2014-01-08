<?php
App::uses('AppController', 'Controller');
/**
 * TPlaces Controller
 *
 * @property TPlace $TPlace
 * @property PaginatorComponent $Paginator
 */
class TPlacesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        public function json(){
            $TPlaces=  $this->TPlace->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($TPlaces));
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
		$this->TPlace->recursive = 0;
		$this->set('tPlaces', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TPlace->exists($id)) {
			throw new NotFoundException(__('Invalid t place'));
		}
		$options = array('conditions' => array('TPlace.' . $this->TPlace->primaryKey => $id));
		$this->set('tPlace', $this->TPlace->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TPlace->create();
			if ($this->TPlace->save($this->request->data)) {
				$this->Session->setFlash(__('The t place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t place could not be saved. Please, try again.'));
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
		if (!$this->TPlace->exists($id)) {
			throw new NotFoundException(__('Invalid t place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TPlace->save($this->request->data)) {
				$this->Session->setFlash(__('The t place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TPlace.' . $this->TPlace->primaryKey => $id));
			$this->request->data = $this->TPlace->find('first', $options);
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
		$this->TPlace->id = $id;
		if (!$this->TPlace->exists()) {
			throw new NotFoundException(__('Invalid t place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TPlace->delete()) {
			$this->Session->setFlash(__('The t place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The t place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TPlace->recursive = 0;
		$this->set('tPlaces', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TPlace->exists($id)) {
			throw new NotFoundException(__('Invalid t place'));
		}
		$options = array('conditions' => array('TPlace.' . $this->TPlace->primaryKey => $id));
		$this->set('tPlace', $this->TPlace->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TPlace->create();
			if ($this->TPlace->save($this->request->data)) {
				$this->Session->setFlash(__('The t place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t place could not be saved. Please, try again.'));
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
		if (!$this->TPlace->exists($id)) {
			throw new NotFoundException(__('Invalid t place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TPlace->save($this->request->data)) {
				$this->Session->setFlash(__('The t place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TPlace.' . $this->TPlace->primaryKey => $id));
			$this->request->data = $this->TPlace->find('first', $options);
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
		$this->TPlace->id = $id;
		if (!$this->TPlace->exists()) {
			throw new NotFoundException(__('Invalid t place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TPlace->delete()) {
			$this->Session->setFlash(__('The t place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The t place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
