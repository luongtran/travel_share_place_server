<?php
App::uses('AppController', 'Controller');
/**
 * StatusComments Controller
 *
 * @property StatusComment $StatusComment
 * @property PaginatorComponent $Paginator
 */
class StatusCommentsController extends AppController {

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
         private function _renderJson($arr){
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($arr));
         }
         public function getAllComment(){
            $comment=  $this->StatusComment->find('all',array(
                'recursive'=>-1
            ));
            
            $this->_renderJson($comment);
        }
        //add comment
        public function addCommentStatus(){
            $this->_renderJson($this->StatusComment->addComment($this->request->query));
        }
        
        public function getCommentById(){
            $this->_renderJson($this->StatusComment->getCommentById($this->request->query));
        }

        /**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StatusComment->recursive = 0;
		$this->set('statusComments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StatusComment->exists($id)) {
			throw new NotFoundException(__('Invalid status comment'));
		}
		$options = array('conditions' => array('StatusComment.' . $this->StatusComment->primaryKey => $id));
		$this->set('statusComment', $this->StatusComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StatusComment->create();
			if ($this->StatusComment->save($this->request->data)) {
				$this->Session->setFlash(__('The status comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The status comment could not be saved. Please, try again.'));
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
		if (!$this->StatusComment->exists($id)) {
			throw new NotFoundException(__('Invalid status comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StatusComment->save($this->request->data)) {
				$this->Session->setFlash(__('The status comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The status comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StatusComment.' . $this->StatusComment->primaryKey => $id));
			$this->request->data = $this->StatusComment->find('first', $options);
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
		$this->StatusComment->id = $id;
		if (!$this->StatusComment->exists()) {
			throw new NotFoundException(__('Invalid status comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StatusComment->delete()) {
			$this->Session->setFlash(__('The status comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The status comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->StatusComment->recursive = 0;
		$this->set('statusComments', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->StatusComment->exists($id)) {
			throw new NotFoundException(__('Invalid status comment'));
		}
		$options = array('conditions' => array('StatusComment.' . $this->StatusComment->primaryKey => $id));
		$this->set('statusComment', $this->StatusComment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->StatusComment->create();
			if ($this->StatusComment->save($this->request->data)) {
				$this->Session->setFlash(__('The status comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The status comment could not be saved. Please, try again.'));
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
		if (!$this->StatusComment->exists($id)) {
			throw new NotFoundException(__('Invalid status comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StatusComment->save($this->request->data)) {
				$this->Session->setFlash(__('The status comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The status comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StatusComment.' . $this->StatusComment->primaryKey => $id));
			$this->request->data = $this->StatusComment->find('first', $options);
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
		$this->StatusComment->id = $id;
		if (!$this->StatusComment->exists()) {
			throw new NotFoundException(__('Invalid status comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StatusComment->delete()) {
			$this->Session->setFlash(__('The status comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The status comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
