<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');

/**
 * Images Controller
 *
 * @property Image $Image
 * @property PaginatorComponent $Paginator
 */
class ImagesController extends AppController {

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
        
        public $uses=array('Image','User');
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
        
        
        private function _renderJson($arr){
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $this->response->type('json');
            $this->response->body(json_encode($arr));
            
        }
        /*
         *input is request get with id_place
         * output is array json with info image of id_place
         *           */
        
        public function getImagesByIDPlace(){
            
            return $this->_renderJson($this->Image->getImages($this->request->query));
              
        }
        
	public function index() {
		$this->Image->recursive = 0;
		$this->set('images', $this->Paginator->paginate());
	}
        
        private function _uploadImageForProperty($image) {
            $folder = new Folder();
            $path =WWW_ROOT . 'img/properties' . DS .'uploads';
            $folder->create($path);
            //pr($path);die();
            return move_uploaded_file($image['tmp_name'], $path . DS . $image['name']);
        }
        public function delete_file(){
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $path='img/avarta_user/1/1.jpg';
            $file=new File($path,true, 0644);
            
            if($file->exists()){
                $file->delete();
                return 1;
            }
            return 0;
        }
        
        public function upload() {
            $this->layout=NULL;
            $this->autoRender=FALSE;
            $folder = new Folder();
            $file_path =WWW_ROOT . 'img/properties' . DS .'test_uploads';
            $folder->create($file_path);
            //echo $file_path;
            $file_path=$file_path.'/';
            $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
            
            if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
                echo "success";
            } else{
                echo "fail";
            }
        }
        //upload avarta
         public function upload_avarta() {
                    $this->layout=NULL;
                    $this->autoRender=FALSE;
                    $folder = new Folder();
                    $file_name=basename( $_FILES['uploaded_file']['name']);
                    $file_name=str_replace('.jpg','', $file_name);
                    $file_name=str_replace('.png','', $file_name);
                    $id_user=$file_name;
                    $path_save='/img/avarta_user/'.$file_name.'/'.basename( $_FILES['uploaded_file']['name']);
                    $file=new File($path_save,true, 0644);
                    if($file->exists()){
                        $file->delete();
                    }
                    $file_path =WWW_ROOT . 'img/avarta_user/'.$file_name;
                    $folder->create($file_path);
                    $file_path=$file_path.'/';
                    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
                    
                    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
                        $this->User->id=$id_user;
                        $this->User->saveField('avarta',$path_save);
                        echo "success";
                    } else{
                        echo "fail";
                    }
                    
                    
         
        }
        //upload image cover
        public function upload_cover() {
                    $this->layout=NULL;
                    $this->autoRender=FALSE;
                    $folder = new Folder();
                    $file_name=basename( $_FILES['uploaded_file']['name']);
                    $file_name=str_replace('.jpg','', $file_name);
                    $file_name=str_replace('.png','', $file_name);
                    $id_user=$file_name;
                    $path_save='/img/img_cover/'.$file_name.'/'.basename( $_FILES['uploaded_file']['name']);
                    $file=new File($path_save,true, 0644);
                    if($file->exists()){
                        $file->delete();
                    }
                    $file_path =WWW_ROOT . 'img/img_cover/'.$file_name;
                    $folder->create($file_path);
                    $file_path=$file_path.'/';
                    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
                    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
                        $this->User->id=$id_user;
                        $this->User->saveField('image_cover',$path_save);
                        echo "success";
                    } else{
                        echo "fail";
                    }
                    
                    
         
        }
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Image->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}
		$options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
		$this->set('image', $this->Image->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Image->create();
			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
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
		if (!$this->Image->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
			$this->request->data = $this->Image->find('first', $options);
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
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Image->delete()) {
			$this->Session->setFlash(__('The image has been deleted.'));
		} else {
			$this->Session->setFlash(__('The image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Image->recursive = 0;
		$this->set('images', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Image->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}
		$options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
		$this->set('image', $this->Image->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Image->create();
			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
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
		if (!$this->Image->exists($id)) {
			throw new NotFoundException(__('Invalid image'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
			$this->request->data = $this->Image->find('first', $options);
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
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Image->delete()) {
			$this->Session->setFlash(__('The image has been deleted.'));
		} else {
			$this->Session->setFlash(__('The image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
