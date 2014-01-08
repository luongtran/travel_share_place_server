<?php
App::uses('AppController', 'Controller');
/**
 * Voices Controller
 *
 * @property Voice $Voice
 * @property PaginatorComponent $Paginator
 */
class VoicesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        public function json(){
            $Voices=  $this->Voice->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($Voices));
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
		$this->Voice->recursive = 0;
		$this->set('voices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Voice->exists($id)) {
			throw new NotFoundException(__('Invalid voice'));
		}
		$options = array('conditions' => array('Voice.' . $this->Voice->primaryKey => $id));
		$this->set('voice', $this->Voice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Voice->create();
			if ($this->Voice->save($this->request->data)) {
				$this->Session->setFlash(__('The voice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voice could not be saved. Please, try again.'));
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
		if (!$this->Voice->exists($id)) {
			throw new NotFoundException(__('Invalid voice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Voice->save($this->request->data)) {
				$this->Session->setFlash(__('The voice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Voice.' . $this->Voice->primaryKey => $id));
			$this->request->data = $this->Voice->find('first', $options);
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
		$this->Voice->id = $id;
		if (!$this->Voice->exists()) {
			throw new NotFoundException(__('Invalid voice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Voice->delete()) {
			$this->Session->setFlash(__('The voice has been deleted.'));
		} else {
			$this->Session->setFlash(__('The voice could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Voice->recursive = 0;
		$this->set('voices', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Voice->exists($id)) {
			throw new NotFoundException(__('Invalid voice'));
		}
		$options = array('conditions' => array('Voice.' . $this->Voice->primaryKey => $id));
		$this->set('voice', $this->Voice->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Voice->create();
			if ($this->Voice->save($this->request->data)) {
				$this->Session->setFlash(__('The voice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voice could not be saved. Please, try again.'));
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
		if (!$this->Voice->exists($id)) {
			throw new NotFoundException(__('Invalid voice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Voice->save($this->request->data)) {
				$this->Session->setFlash(__('The voice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Voice.' . $this->Voice->primaryKey => $id));
			$this->request->data = $this->Voice->find('first', $options);
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
		$this->Voice->id = $id;
		if (!$this->Voice->exists()) {
			throw new NotFoundException(__('Invalid voice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Voice->delete()) {
			$this->Session->setFlash(__('The voice has been deleted.'));
		} else {
			$this->Session->setFlash(__('The voice could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
