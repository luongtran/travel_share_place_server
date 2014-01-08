<?php
App::uses('AppController', 'Controller');
/**
 * Educations Controller
 *
 * @property Education $Education
 * @property PaginatorComponent $Paginator
 */
class EducationsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        public function json(){
            $Educations=  $this->Education->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($Educations));
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
		$this->Education->recursive = 0;
		$this->set('educations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Education->exists($id)) {
			throw new NotFoundException(__('Invalid education'));
		}
		$options = array('conditions' => array('Education.' . $this->Education->primaryKey => $id));
		$this->set('education', $this->Education->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Education->create();
			if ($this->Education->save($this->request->data)) {
				$this->Session->setFlash(__('The education has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The education could not be saved. Please, try again.'));
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
		if (!$this->Education->exists($id)) {
			throw new NotFoundException(__('Invalid education'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Education->save($this->request->data)) {
				$this->Session->setFlash(__('The education has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The education could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Education.' . $this->Education->primaryKey => $id));
			$this->request->data = $this->Education->find('first', $options);
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
		$this->Education->id = $id;
		if (!$this->Education->exists()) {
			throw new NotFoundException(__('Invalid education'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Education->delete()) {
			$this->Session->setFlash(__('The education has been deleted.'));
		} else {
			$this->Session->setFlash(__('The education could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Education->recursive = 0;
		$this->set('educations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Education->exists($id)) {
			throw new NotFoundException(__('Invalid education'));
		}
		$options = array('conditions' => array('Education.' . $this->Education->primaryKey => $id));
		$this->set('education', $this->Education->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Education->create();
			if ($this->Education->save($this->request->data)) {
				$this->Session->setFlash(__('The education has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The education could not be saved. Please, try again.'));
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
		if (!$this->Education->exists($id)) {
			throw new NotFoundException(__('Invalid education'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Education->save($this->request->data)) {
				$this->Session->setFlash(__('The education has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The education could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Education.' . $this->Education->primaryKey => $id));
			$this->request->data = $this->Education->find('first', $options);
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
		$this->Education->id = $id;
		if (!$this->Education->exists()) {
			throw new NotFoundException(__('Invalid education'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Education->delete()) {
			$this->Session->setFlash(__('The education has been deleted.'));
		} else {
			$this->Session->setFlash(__('The education could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
