<?php
App::uses('AppController', 'Controller');
/**
 * CircumstanceMessages Controller
 *
 * @property CircumstanceMessage $CircumstanceMessage
 * @property PaginatorComponent $Paginator
 */
class CircumstanceMessagesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        public function json(){
            $CircumstanceMessages=  $this->CircumstanceMessage->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($CircumstanceMessages));
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
		$this->CircumstanceMessage->recursive = 0;
		$this->set('circumstanceMessages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CircumstanceMessage->exists($id)) {
			throw new NotFoundException(__('Invalid circumstance message'));
		}
		$options = array('conditions' => array('CircumstanceMessage.' . $this->CircumstanceMessage->primaryKey => $id));
		$this->set('circumstanceMessage', $this->CircumstanceMessage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CircumstanceMessage->create();
			if ($this->CircumstanceMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The circumstance message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The circumstance message could not be saved. Please, try again.'));
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
		if (!$this->CircumstanceMessage->exists($id)) {
			throw new NotFoundException(__('Invalid circumstance message'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CircumstanceMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The circumstance message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The circumstance message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CircumstanceMessage.' . $this->CircumstanceMessage->primaryKey => $id));
			$this->request->data = $this->CircumstanceMessage->find('first', $options);
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
		$this->CircumstanceMessage->id = $id;
		if (!$this->CircumstanceMessage->exists()) {
			throw new NotFoundException(__('Invalid circumstance message'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CircumstanceMessage->delete()) {
			$this->Session->setFlash(__('The circumstance message has been deleted.'));
		} else {
			$this->Session->setFlash(__('The circumstance message could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CircumstanceMessage->recursive = 0;
		$this->set('circumstanceMessages', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CircumstanceMessage->exists($id)) {
			throw new NotFoundException(__('Invalid circumstance message'));
		}
		$options = array('conditions' => array('CircumstanceMessage.' . $this->CircumstanceMessage->primaryKey => $id));
		$this->set('circumstanceMessage', $this->CircumstanceMessage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CircumstanceMessage->create();
			if ($this->CircumstanceMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The circumstance message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The circumstance message could not be saved. Please, try again.'));
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
		if (!$this->CircumstanceMessage->exists($id)) {
			throw new NotFoundException(__('Invalid circumstance message'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CircumstanceMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The circumstance message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The circumstance message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CircumstanceMessage.' . $this->CircumstanceMessage->primaryKey => $id));
			$this->request->data = $this->CircumstanceMessage->find('first', $options);
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
		$this->CircumstanceMessage->id = $id;
		if (!$this->CircumstanceMessage->exists()) {
			throw new NotFoundException(__('Invalid circumstance message'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CircumstanceMessage->delete()) {
			$this->Session->setFlash(__('The circumstance message has been deleted.'));
		} else {
			$this->Session->setFlash(__('The circumstance message could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
