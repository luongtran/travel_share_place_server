<?php
App::uses('AppController', 'Controller');
/**
 * TVoices Controller
 *
 * @property TVoice $TVoice
 * @property PaginatorComponent $Paginator
 */
class TVoicesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        public function json(){
            $TVoices=  $this->TVoice->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($TVoices));
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
		$this->TVoice->recursive = 0;
		$this->set('tVoices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TVoice->exists($id)) {
			throw new NotFoundException(__('Invalid t voice'));
		}
		$options = array('conditions' => array('TVoice.' . $this->TVoice->primaryKey => $id));
		$this->set('tVoice', $this->TVoice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TVoice->create();
			if ($this->TVoice->save($this->request->data)) {
				$this->Session->setFlash(__('The t voice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t voice could not be saved. Please, try again.'));
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
		if (!$this->TVoice->exists($id)) {
			throw new NotFoundException(__('Invalid t voice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TVoice->save($this->request->data)) {
				$this->Session->setFlash(__('The t voice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t voice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TVoice.' . $this->TVoice->primaryKey => $id));
			$this->request->data = $this->TVoice->find('first', $options);
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
		$this->TVoice->id = $id;
		if (!$this->TVoice->exists()) {
			throw new NotFoundException(__('Invalid t voice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TVoice->delete()) {
			$this->Session->setFlash(__('The t voice has been deleted.'));
		} else {
			$this->Session->setFlash(__('The t voice could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TVoice->recursive = 0;
		$this->set('tVoices', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TVoice->exists($id)) {
			throw new NotFoundException(__('Invalid t voice'));
		}
		$options = array('conditions' => array('TVoice.' . $this->TVoice->primaryKey => $id));
		$this->set('tVoice', $this->TVoice->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TVoice->create();
			if ($this->TVoice->save($this->request->data)) {
				$this->Session->setFlash(__('The t voice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t voice could not be saved. Please, try again.'));
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
		if (!$this->TVoice->exists($id)) {
			throw new NotFoundException(__('Invalid t voice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TVoice->save($this->request->data)) {
				$this->Session->setFlash(__('The t voice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The t voice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TVoice.' . $this->TVoice->primaryKey => $id));
			$this->request->data = $this->TVoice->find('first', $options);
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
		$this->TVoice->id = $id;
		if (!$this->TVoice->exists()) {
			throw new NotFoundException(__('Invalid t voice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TVoice->delete()) {
			$this->Session->setFlash(__('The t voice has been deleted.'));
		} else {
			$this->Session->setFlash(__('The t voice could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
