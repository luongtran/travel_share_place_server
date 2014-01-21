<?php
App::uses('AppController', 'Controller');
/**
 * ViewPlaces Controller
 *
 * @property ViewPlace $ViewPlace
 * @property PaginatorComponent $Paginator
 */
class ViewPlacesController extends AppController {

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
        public function saveViewPlace(){
            $this->_renderJson($this->ViewPlace->saveView($this->request->query));
        }
         //function use test algorithms matching
        public function getViewPlace(){
            $this->_renderJson($this->ViewPlace->a_checkHighViewPlaceOfUser(1,3));
        }

        /**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ViewPlace->recursive = 0;
		$this->set('viewPlaces', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ViewPlace->exists($id)) {
			throw new NotFoundException(__('Invalid view place'));
		}
		$options = array('conditions' => array('ViewPlace.' . $this->ViewPlace->primaryKey => $id));
		$this->set('viewPlace', $this->ViewPlace->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ViewPlace->create();
			if ($this->ViewPlace->save($this->request->data)) {
				$this->Session->setFlash(__('The view place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view place could not be saved. Please, try again.'));
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
		if (!$this->ViewPlace->exists($id)) {
			throw new NotFoundException(__('Invalid view place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ViewPlace->save($this->request->data)) {
				$this->Session->setFlash(__('The view place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ViewPlace.' . $this->ViewPlace->primaryKey => $id));
			$this->request->data = $this->ViewPlace->find('first', $options);
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
		$this->ViewPlace->id = $id;
		if (!$this->ViewPlace->exists()) {
			throw new NotFoundException(__('Invalid view place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ViewPlace->delete()) {
			$this->Session->setFlash(__('The view place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The view place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ViewPlace->recursive = 0;
		$this->set('viewPlaces', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ViewPlace->exists($id)) {
			throw new NotFoundException(__('Invalid view place'));
		}
		$options = array('conditions' => array('ViewPlace.' . $this->ViewPlace->primaryKey => $id));
		$this->set('viewPlace', $this->ViewPlace->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ViewPlace->create();
			if ($this->ViewPlace->save($this->request->data)) {
				$this->Session->setFlash(__('The view place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view place could not be saved. Please, try again.'));
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
		if (!$this->ViewPlace->exists($id)) {
			throw new NotFoundException(__('Invalid view place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ViewPlace->save($this->request->data)) {
				$this->Session->setFlash(__('The view place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ViewPlace.' . $this->ViewPlace->primaryKey => $id));
			$this->request->data = $this->ViewPlace->find('first', $options);
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
		$this->ViewPlace->id = $id;
		if (!$this->ViewPlace->exists()) {
			throw new NotFoundException(__('Invalid view place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ViewPlace->delete()) {
			$this->Session->setFlash(__('The view place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The view place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
