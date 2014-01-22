<?php
App::uses('AppController', 'Controller');
/**
 * LikePlaces Controller
 *
 * @property LikePlace $LikePlace
 * @property PaginatorComponent $Paginator
 */
class LikePlacesController extends AppController {

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
        
        //function for check function of algorithms matching
        public function getPlaceLike(){
            $this->_renderJson($this->LikePlace->a1_getPlaceLikeOfUser(1,5));
        }

        /**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->LikePlace->recursive = 0;
		$this->set('likePlaces', $this->Paginator->paginate());
	}
       
        /*
            input: request get container user_id and place_id
         *  output: 0 -> not store
         *          1 -> store success
         *          */
        
        public function storeLikePlace(){
            return $this->_renderJson($this->LikePlace->storeLike($this->request->query));
        }

        /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LikePlace->exists($id)) {
			throw new NotFoundException(__('Invalid like place'));
		}
		$options = array('conditions' => array('LikePlace.' . $this->LikePlace->primaryKey => $id));
		$this->set('likePlace', $this->LikePlace->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LikePlace->create();
			if ($this->LikePlace->save($this->request->data)) {
				$this->Session->setFlash(__('The like place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The like place could not be saved. Please, try again.'));
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
		if (!$this->LikePlace->exists($id)) {
			throw new NotFoundException(__('Invalid like place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LikePlace->save($this->request->data)) {
				$this->Session->setFlash(__('The like place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The like place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LikePlace.' . $this->LikePlace->primaryKey => $id));
			$this->request->data = $this->LikePlace->find('first', $options);
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
		$this->LikePlace->id = $id;
		if (!$this->LikePlace->exists()) {
			throw new NotFoundException(__('Invalid like place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LikePlace->delete()) {
			$this->Session->setFlash(__('The like place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The like place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->LikePlace->recursive = 0;
		$this->set('likePlaces', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->LikePlace->exists($id)) {
			throw new NotFoundException(__('Invalid like place'));
		}
		$options = array('conditions' => array('LikePlace.' . $this->LikePlace->primaryKey => $id));
		$this->set('likePlace', $this->LikePlace->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->LikePlace->create();
			if ($this->LikePlace->save($this->request->data)) {
				$this->Session->setFlash(__('The like place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The like place could not be saved. Please, try again.'));
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
		if (!$this->LikePlace->exists($id)) {
			throw new NotFoundException(__('Invalid like place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LikePlace->save($this->request->data)) {
				$this->Session->setFlash(__('The like place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The like place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LikePlace.' . $this->LikePlace->primaryKey => $id));
			$this->request->data = $this->LikePlace->find('first', $options);
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
		$this->LikePlace->id = $id;
		if (!$this->LikePlace->exists()) {
			throw new NotFoundException(__('Invalid like place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LikePlace->delete()) {
			$this->Session->setFlash(__('The like place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The like place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
