<?php
App::uses('AppController', 'Controller');
/**
 * LikeStatuses Controller
 *
 * @property LikeStatus $LikeStatus
 * @property PaginatorComponent $Paginator
 */
class LikeStatusesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');
        private function _renderJson($arr){
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($arr));
        }
        public function addLikeStatus(){
            $this->_renderJson($this->LikeStatus->addLike($this->request->query));
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
		$this->LikeStatus->recursive = 0;
		$this->set('likeStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LikeStatus->exists($id)) {
			throw new NotFoundException(__('Invalid like status'));
		}
		$options = array('conditions' => array('LikeStatus.' . $this->LikeStatus->primaryKey => $id));
		$this->set('likeStatus', $this->LikeStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LikeStatus->create();
			if ($this->LikeStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The like status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The like status could not be saved. Please, try again.'));
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
		if (!$this->LikeStatus->exists($id)) {
			throw new NotFoundException(__('Invalid like status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LikeStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The like status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The like status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LikeStatus.' . $this->LikeStatus->primaryKey => $id));
			$this->request->data = $this->LikeStatus->find('first', $options);
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
		$this->LikeStatus->id = $id;
		if (!$this->LikeStatus->exists()) {
			throw new NotFoundException(__('Invalid like status'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LikeStatus->delete()) {
			$this->Session->setFlash(__('The like status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The like status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->LikeStatus->recursive = 0;
		$this->set('likeStatuses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->LikeStatus->exists($id)) {
			throw new NotFoundException(__('Invalid like status'));
		}
		$options = array('conditions' => array('LikeStatus.' . $this->LikeStatus->primaryKey => $id));
		$this->set('likeStatus', $this->LikeStatus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->LikeStatus->create();
			if ($this->LikeStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The like status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The like status could not be saved. Please, try again.'));
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
		if (!$this->LikeStatus->exists($id)) {
			throw new NotFoundException(__('Invalid like status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LikeStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The like status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The like status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LikeStatus.' . $this->LikeStatus->primaryKey => $id));
			$this->request->data = $this->LikeStatus->find('first', $options);
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
		$this->LikeStatus->id = $id;
		if (!$this->LikeStatus->exists()) {
			throw new NotFoundException(__('Invalid like status'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LikeStatus->delete()) {
			$this->Session->setFlash(__('The like status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The like status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
