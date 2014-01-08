<?php
App::uses('AppController', 'Controller');
/**
 * TMessages Controller
 *
 * @property TMessage $TMessage
 * @property PaginatorComponent $Paginator
 */
class TMessagesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        public function json(){
            $TMessages=  $this->TMessage->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($TMessages));
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
		$this->TMessage->recursive = 0;
		$this->set('tMessages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TMessage->exists($id)) {
			throw new NotFoundException(__('Invalid t message'));
		}
		$options = array('conditions' => array('TMessage.' . $this->TMessage->primaryKey => $id));
		$this->set('tMessage', $this->TMessage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TMessage->create();
			if ($this->TMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The t message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t message could not be saved. Please, try again.'));
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
		if (!$this->TMessage->exists($id)) {
			throw new NotFoundException(__('Invalid t message'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The t message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TMessage.' . $this->TMessage->primaryKey => $id));
			$this->request->data = $this->TMessage->find('first', $options);
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
		$this->TMessage->id = $id;
		if (!$this->TMessage->exists()) {
			throw new NotFoundException(__('Invalid t message'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TMessage->delete()) {
			$this->Session->setFlash(__('The t message has been deleted.'));
		} else {
			$this->Session->setFlash(__('The t message could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TMessage->recursive = 0;
		$this->set('tMessages', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TMessage->exists($id)) {
			throw new NotFoundException(__('Invalid t message'));
		}
		$options = array('conditions' => array('TMessage.' . $this->TMessage->primaryKey => $id));
		$this->set('tMessage', $this->TMessage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TMessage->create();
			if ($this->TMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The t message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t message could not be saved. Please, try again.'));
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
		if (!$this->TMessage->exists($id)) {
			throw new NotFoundException(__('Invalid t message'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The t message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TMessage.' . $this->TMessage->primaryKey => $id));
			$this->request->data = $this->TMessage->find('first', $options);
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
		$this->TMessage->id = $id;
		if (!$this->TMessage->exists()) {
			throw new NotFoundException(__('Invalid t message'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TMessage->delete()) {
			$this->Session->setFlash(__('The t message has been deleted.'));
		} else {
			$this->Session->setFlash(__('The t message could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
