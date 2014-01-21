<?php
App::uses('AppController', 'Controller');

/**
 * PlaceComments Controller
 *
 * @property PlaceComment $PlaceComment
 * @property PaginatorComponent $Paginator
 */
class PlaceCommentsController extends AppController {

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
//            $ar=array();
//            for($i=0;$i<count($arr);$i++){
//                array_push($ar,$arr[$i]['City']);
//            }
            //pr($ar);
            $this->response->body(json_encode($arr));
         }
         public function getAllComment(){
            $comment=  $this->PlaceComment->find('all',array(
                'recursive'=>-1
            ));
            $this->_renderJson($comment);
        }
        
        public function getCommentByIdPlace(){
            if($this->request->is('get'))
                return $this->_renderJson($this->PlaceComment->getComments($this->request->query));

        }
        
        public function saveComment(){
            $this->_renderJson($this->PlaceComment->saveComment($this->request->query));
            
        }
        //function use test algorithms matching
        public function a_CheckPlaceManyComment(){
            $this->_renderJson($this->PlaceComment->a_CheckPlaceManyComment(3));
        }


        /**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PlaceComment->recursive = 0;
		$this->set('placeComments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlaceComment->exists($id)) {
			throw new NotFoundException(__('Invalid place comment'));
		}
		$options = array('conditions' => array('PlaceComment.' . $this->PlaceComment->primaryKey => $id));
		$this->set('placeComment', $this->PlaceComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlaceComment->create();
			if ($this->PlaceComment->save($this->request->data)) {
				$this->Session->setFlash(__('The place comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place comment could not be saved. Please, try again.'));
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
		if (!$this->PlaceComment->exists($id)) {
			throw new NotFoundException(__('Invalid place comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PlaceComment->save($this->request->data)) {
				$this->Session->setFlash(__('The place comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PlaceComment.' . $this->PlaceComment->primaryKey => $id));
			$this->request->data = $this->PlaceComment->find('first', $options);
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
		$this->PlaceComment->id = $id;
		if (!$this->PlaceComment->exists()) {
			throw new NotFoundException(__('Invalid place comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceComment->delete()) {
			$this->Session->setFlash(__('The place comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The place comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PlaceComment->recursive = 0;
		$this->set('placeComments', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PlaceComment->exists($id)) {
			throw new NotFoundException(__('Invalid place comment'));
		}
		$options = array('conditions' => array('PlaceComment.' . $this->PlaceComment->primaryKey => $id));
		$this->set('placeComment', $this->PlaceComment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PlaceComment->create();
			if ($this->PlaceComment->save($this->request->data)) {
				$this->Session->setFlash(__('The place comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place comment could not be saved. Please, try again.'));
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
		if (!$this->PlaceComment->exists($id)) {
			throw new NotFoundException(__('Invalid place comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PlaceComment->save($this->request->data)) {
				$this->Session->setFlash(__('The place comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PlaceComment.' . $this->PlaceComment->primaryKey => $id));
			$this->request->data = $this->PlaceComment->find('first', $options);
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
		$this->PlaceComment->id = $id;
		if (!$this->PlaceComment->exists()) {
			throw new NotFoundException(__('Invalid place comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceComment->delete()) {
			$this->Session->setFlash(__('The place comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The place comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
