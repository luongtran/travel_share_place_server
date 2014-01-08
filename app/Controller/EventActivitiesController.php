<?php
App::uses('AppController', 'Controller');
/**
 * EventActivities Controller
 *
 * @property EventActivity $EventActivity
 * @property PaginatorComponent $Paginator
 */
class EventActivitiesController extends AppController {

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
         public function getAllEvent(){
            $event=  $this->EventActivity->find('all',array(
                'recursive'=>-1
            ));
            $this->_renderJson($event);
        }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EventActivity->recursive = 0;
		$this->set('eventActivities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EventActivity->exists($id)) {
			throw new NotFoundException(__('Invalid event activity'));
		}
		$options = array('conditions' => array('EventActivity.' . $this->EventActivity->primaryKey => $id));
		$this->set('eventActivity', $this->EventActivity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventActivity->create();
			if ($this->EventActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The event activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event activity could not be saved. Please, try again.'));
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
		if (!$this->EventActivity->exists($id)) {
			throw new NotFoundException(__('Invalid event activity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EventActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The event activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event activity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EventActivity.' . $this->EventActivity->primaryKey => $id));
			$this->request->data = $this->EventActivity->find('first', $options);
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
		$this->EventActivity->id = $id;
		if (!$this->EventActivity->exists()) {
			throw new NotFoundException(__('Invalid event activity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EventActivity->delete()) {
			$this->Session->setFlash(__('The event activity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The event activity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->EventActivity->recursive = 0;
		$this->set('eventActivities', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->EventActivity->exists($id)) {
			throw new NotFoundException(__('Invalid event activity'));
		}
		$options = array('conditions' => array('EventActivity.' . $this->EventActivity->primaryKey => $id));
		$this->set('eventActivity', $this->EventActivity->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->EventActivity->create();
			if ($this->EventActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The event activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event activity could not be saved. Please, try again.'));
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
		if (!$this->EventActivity->exists($id)) {
			throw new NotFoundException(__('Invalid event activity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EventActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The event activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event activity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EventActivity.' . $this->EventActivity->primaryKey => $id));
			$this->request->data = $this->EventActivity->find('first', $options);
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
		$this->EventActivity->id = $id;
		if (!$this->EventActivity->exists()) {
			throw new NotFoundException(__('Invalid event activity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EventActivity->delete()) {
			$this->Session->setFlash(__('The event activity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The event activity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
