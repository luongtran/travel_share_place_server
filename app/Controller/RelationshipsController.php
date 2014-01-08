<?php
App::uses('AppController', 'Controller');
/**
 * Relationships Controller
 *
 * @property Relationship $Relationship
 * @property PaginatorComponent $Paginator
 */
class RelationshipsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        public function json(){
            $Relationships=  $this->Relationship->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($Relationships));
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
		$this->Relationship->recursive = 0;
		$this->set('relationships', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Relationship->exists($id)) {
			throw new NotFoundException(__('Invalid relationship'));
		}
		$options = array('conditions' => array('Relationship.' . $this->Relationship->primaryKey => $id));
		$this->set('relationship', $this->Relationship->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Relationship->create();
			if ($this->Relationship->save($this->request->data)) {
				$this->Session->setFlash(__('The relationship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The relationship could not be saved. Please, try again.'));
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
		if (!$this->Relationship->exists($id)) {
			throw new NotFoundException(__('Invalid relationship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Relationship->save($this->request->data)) {
				$this->Session->setFlash(__('The relationship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The relationship could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Relationship.' . $this->Relationship->primaryKey => $id));
			$this->request->data = $this->Relationship->find('first', $options);
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
		$this->Relationship->id = $id;
		if (!$this->Relationship->exists()) {
			throw new NotFoundException(__('Invalid relationship'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Relationship->delete()) {
			$this->Session->setFlash(__('The relationship has been deleted.'));
		} else {
			$this->Session->setFlash(__('The relationship could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Relationship->recursive = 0;
		$this->set('relationships', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Relationship->exists($id)) {
			throw new NotFoundException(__('Invalid relationship'));
		}
		$options = array('conditions' => array('Relationship.' . $this->Relationship->primaryKey => $id));
		$this->set('relationship', $this->Relationship->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Relationship->create();
			if ($this->Relationship->save($this->request->data)) {
				$this->Session->setFlash(__('The relationship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The relationship could not be saved. Please, try again.'));
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
		if (!$this->Relationship->exists($id)) {
			throw new NotFoundException(__('Invalid relationship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Relationship->save($this->request->data)) {
				$this->Session->setFlash(__('The relationship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The relationship could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Relationship.' . $this->Relationship->primaryKey => $id));
			$this->request->data = $this->Relationship->find('first', $options);
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
		$this->Relationship->id = $id;
		if (!$this->Relationship->exists()) {
			throw new NotFoundException(__('Invalid relationship'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Relationship->delete()) {
			$this->Session->setFlash(__('The relationship has been deleted.'));
		} else {
			$this->Session->setFlash(__('The relationship could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
