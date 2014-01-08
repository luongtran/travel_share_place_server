<?php
App::uses('AppController', 'Controller');
/**
 * TFeatures Controller
 *
 * @property TFeature $TFeature
 * @property PaginatorComponent $Paginator
 */
class TFeaturesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');

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
		$this->TFeature->recursive = 0;
		$this->set('tFeatures', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TFeature->exists($id)) {
			throw new NotFoundException(__('Invalid t feature'));
		}
		$options = array('conditions' => array('TFeature.' . $this->TFeature->primaryKey => $id));
		$this->set('tFeature', $this->TFeature->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TFeature->create();
			if ($this->TFeature->save($this->request->data)) {
				$this->Session->setFlash(__('The t feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t feature could not be saved. Please, try again.'));
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
		if (!$this->TFeature->exists($id)) {
			throw new NotFoundException(__('Invalid t feature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TFeature->save($this->request->data)) {
				$this->Session->setFlash(__('The t feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t feature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TFeature.' . $this->TFeature->primaryKey => $id));
			$this->request->data = $this->TFeature->find('first', $options);
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
		$this->TFeature->id = $id;
		if (!$this->TFeature->exists()) {
			throw new NotFoundException(__('Invalid t feature'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TFeature->delete()) {
			$this->Session->setFlash(__('The t feature has been deleted.'));
		} else {
			$this->Session->setFlash(__('The t feature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TFeature->recursive = 0;
		$this->set('tFeatures', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TFeature->exists($id)) {
			throw new NotFoundException(__('Invalid t feature'));
		}
		$options = array('conditions' => array('TFeature.' . $this->TFeature->primaryKey => $id));
		$this->set('tFeature', $this->TFeature->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TFeature->create();
			if ($this->TFeature->save($this->request->data)) {
				$this->Session->setFlash(__('The t feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t feature could not be saved. Please, try again.'));
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
		if (!$this->TFeature->exists($id)) {
			throw new NotFoundException(__('Invalid t feature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TFeature->save($this->request->data)) {
				$this->Session->setFlash(__('The t feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t feature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TFeature.' . $this->TFeature->primaryKey => $id));
			$this->request->data = $this->TFeature->find('first', $options);
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
		$this->TFeature->id = $id;
		if (!$this->TFeature->exists()) {
			throw new NotFoundException(__('Invalid t feature'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TFeature->delete()) {
			$this->Session->setFlash(__('The t feature has been deleted.'));
		} else {
			$this->Session->setFlash(__('The t feature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
