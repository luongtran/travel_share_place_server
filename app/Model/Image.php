<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 */
class Image extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'image';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        //get images by id_place
        public function getImages($request_get){
            //if()
            $arr_images=array(0);
            if($request_get['place_id']!=NULL){
                $arr_images=  $this->find('all',array(
                    'conditions'=>array('place_id'=>$request_get['place_id'])
                ));
                if($arr_images==NULL)
                    return 0;
                else
                    //pr($arr_images);
                    return $this->_convertArrayImage($arr_images);
            }
            return 0;
            
        }
        /*
         *convert array image to format json
         *           */
        private function _convertArrayImage($arr){
            $arr_image=array();
            for($i=0;$i<count($arr);$i++){
                array_push($arr_image,$arr[$i]['Image']);
            }
            return $arr_image;
        }
}
