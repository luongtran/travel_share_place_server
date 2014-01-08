<?php
App::uses('AppController', 'Controller');
/**
 * SharePlaces Controller
 *
 * @property SharePlace $SharePlace
 * @property PaginatorComponent $Paginator
 */
class SharePlacesController extends AppController {

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
         public function getAllShare(){
            $share=  $this->SharePlace->find('all',array(
                'recursive'=>-1
            ));
            
            $this->_renderJson($share);
        }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SharePlace->recursive = 0;
		$this->set('sharePlaces', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SharePlace->exists($id)) {
			throw new NotFoundException(__('Invalid share place'));
		}
		$options = array('conditions' => array('SharePlace.' . $this->SharePlace->primaryKey => $id));
		$this->set('sharePlace', $this->SharePlace->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SharePlace->create();
			if ($this->SharePlace->save($this->request->data)) {
				$this->Session->setFlash(__('The share place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The share place could not be saved. Please, try again.'));
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
		if (!$this->SharePlace->exists($id)) {
			throw new NotFoundException(__('Invalid share place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SharePlace->save($this->request->data)) {
				$this->Session->setFlash(__('The share place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The share place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SharePlace.' . $this->SharePlace->primaryKey => $id));
			$this->request->data = $this->SharePlace->find('first', $options);
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
		$this->SharePlace->id = $id;
		if (!$this->SharePlace->exists()) {
			throw new NotFoundException(__('Invalid share place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SharePlace->delete()) {
			$this->Session->setFlash(__('The share place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The share place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->SharePlace->recursive = 0;
		$this->set('sharePlaces', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SharePlace->exists($id)) {
			throw new NotFoundException(__('Invalid share place'));
		}
		$options = array('conditions' => array('SharePlace.' . $this->SharePlace->primaryKey => $id));
		$this->set('sharePlace', $this->SharePlace->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SharePlace->create();
			if ($this->SharePlace->save($this->request->data)) {
				$this->Session->setFlash(__('The share place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The share place could not be saved. Please, try again.'));
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
		if (!$this->SharePlace->exists($id)) {
			throw new NotFoundException(__('Invalid share place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SharePlace->save($this->request->data)) {
				$this->Session->setFlash(__('The share place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The share place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SharePlace.' . $this->SharePlace->primaryKey => $id));
			$this->request->data = $this->SharePlace->find('first', $options);
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
		$this->SharePlace->id = $id;
		if (!$this->SharePlace->exists()) {
			throw new NotFoundException(__('Invalid share place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SharePlace->delete()) {
			$this->Session->setFlash(__('The share place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The share place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
