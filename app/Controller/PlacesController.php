<?php
App::uses('AppController', 'Controller');
App::uses('GeocodeLib', 'Tools.Lib');
/**
 * Places Controller
 *
 * @property Place $Place
 * @property PaginatorComponent $Paginator
 */

class PlacesController extends AppController {
    
/**
 * Helpers
 *
 * @var array
 */
        public $components = array('Paginator');
	public $helpers = array('Html');
        public function json(){
            $Places=  $this->Place->find('all');
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($Places));
        }
        
        public function showImage(){
            $image=  $this->Html->image('no_avarta.png');
            echo $this->Html->image('no_avarta.png', array('alt' => 'CakePHP'));
            $this->layout=NULL;
            $this->autoRender=FALSE;
        }
        
        /** 
 * Components
 *
 * @var array
 */
	
        private function _renderJson($arr){
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
//            $ar=array();
//            for($i=0;$i<count($arr);$i++){
//                array_push($ar,$arr[$i]['City']);
//            }
//            //pr($ar);
            $this->response->body(json_encode($arr));
        }
        
        public function getAllPlace(){
            $this->_renderJson($this->Place->getPlaces());
        }
        
        public function getPlaceFromID(){
            $ar=$this->Place->getPlaceFromID($this->request->query);
            $this->_renderJson($ar);
        }
        
          /*
         * input lat,lng,distance from client (mobile)
         * output list places with distance greater than or equal
         *          
          */
        
        //function get place in distance
        public function getPlaceByDistance(){
            $arr=array(0);
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $arr=$this->request->query;
            $arr=$this->Place->getPlaceByDistance($this->request->query);
            $this->_renderJson($arr);
        }
        
        //this function use for test the functions algorithms matching
        public function getPlaceNewFeed(){
            $this->_renderJson($this->Place->a_checkPlaceSameTypePlaceHighView(1,2));
        }
        
        /**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'));
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
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
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
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__('Invalid place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__('The place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'));
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
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__('Invalid place'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('The place has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
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
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__('Invalid place'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__('The place has been deleted.'));
		} else {
			$this->Session->setFlash(__('The place could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
