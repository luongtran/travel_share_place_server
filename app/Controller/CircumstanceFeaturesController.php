<?php
App::uses('AppController', 'Controller');
/**
 * CircumstanceFeatures Controller
 *
 * @property CircumstanceFeature $CircumstanceFeature
 * @property PaginatorComponent $Paginator
 */
class CircumstanceFeaturesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        public function json(){
            $CircumstanceFeatures=  $this->CircumstanceFeature->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($CircumstanceFeatures));
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
		$this->CircumstanceFeature->recursive = 0;
		$this->set('circumstanceFeatures', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CircumstanceFeature->exists($id)) {
			throw new NotFoundException(__('Invalid circumstance feature'));
		}
		$options = array('conditions' => array('CircumstanceFeature.' . $this->CircumstanceFeature->primaryKey => $id));
		$this->set('circumstanceFeature', $this->CircumstanceFeature->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CircumstanceFeature->create();
			if ($this->CircumstanceFeature->save($this->request->data)) {
				$this->Session->setFlash(__('The circumstance feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The circumstance feature could not be saved. Please, try again.'));
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
		if (!$this->CircumstanceFeature->exists($id)) {
			throw new NotFoundException(__('Invalid circumstance feature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CircumstanceFeature->save($this->request->data)) {
				$this->Session->setFlash(__('The circumstance feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The circumstance feature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CircumstanceFeature.' . $this->CircumstanceFeature->primaryKey => $id));
			$this->request->data = $this->CircumstanceFeature->find('first', $options);
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
		$this->CircumstanceFeature->id = $id;
		if (!$this->CircumstanceFeature->exists()) {
			throw new NotFoundException(__('Invalid circumstance feature'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CircumstanceFeature->delete()) {
			$this->Session->setFlash(__('The circumstance feature has been deleted.'));
		} else {
			$this->Session->setFlash(__('The circumstance feature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CircumstanceFeature->recursive = 0;
		$this->set('circumstanceFeatures', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CircumstanceFeature->exists($id)) {
			throw new NotFoundException(__('Invalid circumstance feature'));
		}
		$options = array('conditions' => array('CircumstanceFeature.' . $this->CircumstanceFeature->primaryKey => $id));
		$this->set('circumstanceFeature', $this->CircumstanceFeature->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CircumstanceFeature->create();
			if ($this->CircumstanceFeature->save($this->request->data)) {
				$this->Session->setFlash(__('The circumstance feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The circumstance feature could not be saved. Please, try again.'));
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
		if (!$this->CircumstanceFeature->exists($id)) {
			throw new NotFoundException(__('Invalid circumstance feature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CircumstanceFeature->save($this->request->data)) {
				$this->Session->setFlash(__('The circumstance feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The circumstance feature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CircumstanceFeature.' . $this->CircumstanceFeature->primaryKey => $id));
			$this->request->data = $this->CircumstanceFeature->find('first', $options);
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
		$this->CircumstanceFeature->id = $id;
		if (!$this->CircumstanceFeature->exists()) {
			throw new NotFoundException(__('Invalid circumstance feature'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CircumstanceFeature->delete()) {
			$this->Session->setFlash(__('The circumstance feature has been deleted.'));
		} else {
			$this->Session->setFlash(__('The circumstance feature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
