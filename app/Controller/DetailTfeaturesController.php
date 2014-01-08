<?php
App::uses('AppController', 'Controller');
/**
 * DetailTfeatures Controller
 *
 * @property DetailTfeature $DetailTfeature
 * @property PaginatorComponent $Paginator
 */
class DetailTfeaturesController extends AppController {

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
		$this->DetailTfeature->recursive = 0;
		$this->set('detailTfeatures', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DetailTfeature->exists($id)) {
			throw new NotFoundException(__('Invalid detail tfeature'));
		}
		$options = array('conditions' => array('DetailTfeature.' . $this->DetailTfeature->primaryKey => $id));
		$this->set('detailTfeature', $this->DetailTfeature->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DetailTfeature->create();
			if ($this->DetailTfeature->save($this->request->data)) {
				$this->Session->setFlash(__('The detail tfeature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detail tfeature could not be saved. Please, try again.'));
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
		if (!$this->DetailTfeature->exists($id)) {
			throw new NotFoundException(__('Invalid detail tfeature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DetailTfeature->save($this->request->data)) {
				$this->Session->setFlash(__('The detail tfeature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detail tfeature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DetailTfeature.' . $this->DetailTfeature->primaryKey => $id));
			$this->request->data = $this->DetailTfeature->find('first', $options);
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
		$this->DetailTfeature->id = $id;
		if (!$this->DetailTfeature->exists()) {
			throw new NotFoundException(__('Invalid detail tfeature'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DetailTfeature->delete()) {
			$this->Session->setFlash(__('The detail tfeature has been deleted.'));
		} else {
			$this->Session->setFlash(__('The detail tfeature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DetailTfeature->recursive = 0;
		$this->set('detailTfeatures', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DetailTfeature->exists($id)) {
			throw new NotFoundException(__('Invalid detail tfeature'));
		}
		$options = array('conditions' => array('DetailTfeature.' . $this->DetailTfeature->primaryKey => $id));
		$this->set('detailTfeature', $this->DetailTfeature->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DetailTfeature->create();
			if ($this->DetailTfeature->save($this->request->data)) {
				$this->Session->setFlash(__('The detail tfeature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detail tfeature could not be saved. Please, try again.'));
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
		if (!$this->DetailTfeature->exists($id)) {
			throw new NotFoundException(__('Invalid detail tfeature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DetailTfeature->save($this->request->data)) {
				$this->Session->setFlash(__('The detail tfeature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detail tfeature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DetailTfeature.' . $this->DetailTfeature->primaryKey => $id));
			$this->request->data = $this->DetailTfeature->find('first', $options);
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
		$this->DetailTfeature->id = $id;
		if (!$this->DetailTfeature->exists()) {
			throw new NotFoundException(__('Invalid detail tfeature'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DetailTfeature->delete()) {
			$this->Session->setFlash(__('The detail tfeature has been deleted.'));
		} else {
			$this->Session->setFlash(__('The detail tfeature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
