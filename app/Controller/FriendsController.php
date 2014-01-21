<?php
App::uses('AppController', 'Controller');
/**
 * Friends Controller
 *
 * @property Friend $Friend
 * @property PaginatorComponent $Paginator
 */
class FriendsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        public function json(){
            $Friends=  $this->Friend->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($Friends));
        }
        private function _renderJson($arr){
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($arr));
        }

        public function getFriends(){
            $this->_renderJson($this->Friend->getListFriend($this->request->query));
            
        }
        public function getCheckFriendById(){
            $this->_renderJson($this->Friend->getCheckFriend($this->request->query));
            
        }
        public function addFriend(){
            $this->_renderJson($this->Friend->addFriend($this->request->query));
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
		$this->Friend->recursive = 0;
		$this->set('friends', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Friend->exists($id)) {
			throw new NotFoundException(__('Invalid friend'));
		}
		$options = array('conditions' => array('Friend.' . $this->Friend->primaryKey => $id));
		$this->set('friend', $this->Friend->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Friend->create();
			if ($this->Friend->save($this->request->data)) {
				$this->Session->setFlash(__('The friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.'));
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
		if (!$this->Friend->exists($id)) {
			throw new NotFoundException(__('Invalid friend'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Friend->save($this->request->data)) {
				$this->Session->setFlash(__('The friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Friend.' . $this->Friend->primaryKey => $id));
			$this->request->data = $this->Friend->find('first', $options);
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
		$this->Friend->id = $id;
		if (!$this->Friend->exists()) {
			throw new NotFoundException(__('Invalid friend'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Friend->delete()) {
			$this->Session->setFlash(__('The friend has been deleted.'));
		} else {
			$this->Session->setFlash(__('The friend could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Friend->recursive = 0;
		$this->set('friends', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Friend->exists($id)) {
			throw new NotFoundException(__('Invalid friend'));
		}
		$options = array('conditions' => array('Friend.' . $this->Friend->primaryKey => $id));
		$this->set('friend', $this->Friend->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Friend->create();
			if ($this->Friend->save($this->request->data)) {
				$this->Session->setFlash(__('The friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.'));
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
		if (!$this->Friend->exists($id)) {
			throw new NotFoundException(__('Invalid friend'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Friend->save($this->request->data)) {
				$this->Session->setFlash(__('The friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Friend.' . $this->Friend->primaryKey => $id));
			$this->request->data = $this->Friend->find('first', $options);
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
		$this->Friend->id = $id;
		if (!$this->Friend->exists()) {
			throw new NotFoundException(__('Invalid friend'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Friend->delete()) {
			$this->Session->setFlash(__('The friend has been deleted.'));
		} else {
			$this->Session->setFlash(__('The friend could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
