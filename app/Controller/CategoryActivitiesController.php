<?php
App::uses('AppController', 'Controller');
/**
 * CategoryActivities Controller
 *
 * @property CategoryActivity $CategoryActivity
 * @property PaginatorComponent $Paginator
 */
class CategoryActivitiesController extends AppController {

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
		$this->CategoryActivity->recursive = 0;
		$this->set('categoryActivities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoryActivity->exists($id)) {
			throw new NotFoundException(__('Invalid category activity'));
		}
		$options = array('conditions' => array('CategoryActivity.' . $this->CategoryActivity->primaryKey => $id));
		$this->set('categoryActivity', $this->CategoryActivity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoryActivity->create();
			if ($this->CategoryActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The category activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category activity could not be saved. Please, try again.'));
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
		if (!$this->CategoryActivity->exists($id)) {
			throw new NotFoundException(__('Invalid category activity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategoryActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The category activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category activity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoryActivity.' . $this->CategoryActivity->primaryKey => $id));
			$this->request->data = $this->CategoryActivity->find('first', $options);
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
		$this->CategoryActivity->id = $id;
		if (!$this->CategoryActivity->exists()) {
			throw new NotFoundException(__('Invalid category activity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategoryActivity->delete()) {
			$this->Session->setFlash(__('The category activity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The category activity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CategoryActivity->recursive = 0;
		$this->set('categoryActivities', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CategoryActivity->exists($id)) {
			throw new NotFoundException(__('Invalid category activity'));
		}
		$options = array('conditions' => array('CategoryActivity.' . $this->CategoryActivity->primaryKey => $id));
		$this->set('categoryActivity', $this->CategoryActivity->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CategoryActivity->create();
			if ($this->CategoryActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The category activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category activity could not be saved. Please, try again.'));
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
		if (!$this->CategoryActivity->exists($id)) {
			throw new NotFoundException(__('Invalid category activity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategoryActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The category activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category activity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoryActivity.' . $this->CategoryActivity->primaryKey => $id));
			$this->request->data = $this->CategoryActivity->find('first', $options);
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
		$this->CategoryActivity->id = $id;
		if (!$this->CategoryActivity->exists()) {
			throw new NotFoundException(__('Invalid category activity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategoryActivity->delete()) {
			$this->Session->setFlash(__('The category activity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The category activity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
