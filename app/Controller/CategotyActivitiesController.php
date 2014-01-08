<?php
App::uses('AppController', 'Controller');
/**
 * CategotyActivities Controller
 *
 * @property CategotyActivity $CategotyActivity
 * @property PaginatorComponent $Paginator
 */
class CategotyActivitiesController extends AppController {

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
         public function getAllCategory(){
            $category=  $this->CategotyActivity->find('all',array(
                'recursive'=>-1
            ));
            
            $this->_renderJson($category);
        }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CategotyActivity->recursive = 0;
		$this->set('categotyActivities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategotyActivity->exists($id)) {
			throw new NotFoundException(__('Invalid categoty activity'));
		}
		$options = array('conditions' => array('CategotyActivity.' . $this->CategotyActivity->primaryKey => $id));
		$this->set('categotyActivity', $this->CategotyActivity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategotyActivity->create();
			if ($this->CategotyActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The categoty activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoty activity could not be saved. Please, try again.'));
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
		if (!$this->CategotyActivity->exists($id)) {
			throw new NotFoundException(__('Invalid categoty activity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategotyActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The categoty activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoty activity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategotyActivity.' . $this->CategotyActivity->primaryKey => $id));
			$this->request->data = $this->CategotyActivity->find('first', $options);
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
		$this->CategotyActivity->id = $id;
		if (!$this->CategotyActivity->exists()) {
			throw new NotFoundException(__('Invalid categoty activity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategotyActivity->delete()) {
			$this->Session->setFlash(__('The categoty activity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categoty activity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CategotyActivity->recursive = 0;
		$this->set('categotyActivities', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CategotyActivity->exists($id)) {
			throw new NotFoundException(__('Invalid categoty activity'));
		}
		$options = array('conditions' => array('CategotyActivity.' . $this->CategotyActivity->primaryKey => $id));
		$this->set('categotyActivity', $this->CategotyActivity->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CategotyActivity->create();
			if ($this->CategotyActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The categoty activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoty activity could not be saved. Please, try again.'));
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
		if (!$this->CategotyActivity->exists($id)) {
			throw new NotFoundException(__('Invalid categoty activity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategotyActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The categoty activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoty activity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategotyActivity.' . $this->CategotyActivity->primaryKey => $id));
			$this->request->data = $this->CategotyActivity->find('first', $options);
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
		$this->CategotyActivity->id = $id;
		if (!$this->CategotyActivity->exists()) {
			throw new NotFoundException(__('Invalid categoty activity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategotyActivity->delete()) {
			$this->Session->setFlash(__('The categoty activity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categoty activity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
