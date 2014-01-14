<?php
App::uses('AppController', 'Controller');

/**
 * PlaceFavorites Controller
 *
 * @property PlaceFavorite $PlaceFavorite
 * @property PaginatorComponent $Paginator
 */
class PlaceFavoritesController extends AppController {

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
        public function storeFavorite(){
           $this->_renderJson($this->PlaceFavorite->getFavorite($this->request->query));
           //$this->_renderJson(array());
        }
        
        public function getPlacesFavorite(){
            $this->_renderJson($this->PlaceFavorite->getPlacesFavorite($this->request->query));
        }
        /*
            check exists favorite of user
         *          */
        public function checkExistsFavorite(){
            $this->layout=NULL;
            $this->autoRender=False;
            $favorite=  $this->request->query;
            $check=  $this->PlaceFavorite->find('all',array(
                'conditions'=>array('user_id'=>$favorite['user_id'],'place_id'=>$favorite['place_id'])
            ));
            if($check!=NULL)
                return 1;
            return 0;
        }

        /**
 * index method
 *
 * @return void
 */
        
	public function index() {
		$this->PlaceFavorite->recursive = 0;
		$this->set('placeFavorites', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlaceFavorite->exists($id)) {
			throw new NotFoundException(__('Invalid place favorite'));
		}
		$options = array('conditions' => array('PlaceFavorite.' . $this->PlaceFavorite->primaryKey => $id));
		$this->set('placeFavorite', $this->PlaceFavorite->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlaceFavorite->create();
			if ($this->PlaceFavorite->save($this->request->data)) {
				$this->Session->setFlash(__('The place favorite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place favorite could not be saved. Please, try again.'));
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
		if (!$this->PlaceFavorite->exists($id)) {
			throw new NotFoundException(__('Invalid place favorite'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PlaceFavorite->save($this->request->data)) {
				$this->Session->setFlash(__('The place favorite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place favorite could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PlaceFavorite.' . $this->PlaceFavorite->primaryKey => $id));
			$this->request->data = $this->PlaceFavorite->find('first', $options);
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
		$this->PlaceFavorite->id = $id;
		if (!$this->PlaceFavorite->exists()) {
			throw new NotFoundException(__('Invalid place favorite'));
		}
		$this->request->onlyAllow('post', 'delete');
                
		if ($this->PlaceFavorite->delete()) {
			$this->Session->setFlash(__('The place favorite has been deleted.'));
		} else {
			$this->Session->setFlash(__('The place favorite could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PlaceFavorite->recursive = 0;
		$this->set('placeFavorites', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PlaceFavorite->exists($id)) {
			throw new NotFoundException(__('Invalid place favorite'));
		}
		$options = array('conditions' => array('PlaceFavorite.' . $this->PlaceFavorite->primaryKey => $id));
		$this->set('placeFavorite', $this->PlaceFavorite->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PlaceFavorite->create();
			if ($this->PlaceFavorite->save($this->request->data)) {
				$this->Session->setFlash(__('The place favorite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place favorite could not be saved. Please, try again.'));
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
		if (!$this->PlaceFavorite->exists($id)) {
			throw new NotFoundException(__('Invalid place favorite'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PlaceFavorite->save($this->request->data)) {
				$this->Session->setFlash(__('The place favorite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The place favorite could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PlaceFavorite.' . $this->PlaceFavorite->primaryKey => $id));
			$this->request->data = $this->PlaceFavorite->find('first', $options);
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
		$this->PlaceFavorite->id = $id;
		if (!$this->PlaceFavorite->exists()) {
			throw new NotFoundException(__('Invalid place favorite'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceFavorite->delete()) {
			$this->Session->setFlash(__('The place favorite has been deleted.'));
		} else {
			$this->Session->setFlash(__('The place favorite could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
