<?php
App::uses('AppModel', 'Model');
/**
 * LikeStatus Model
 *
 */
class LikeStatus extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'like_status';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        
        /*
            input: request get
         * output: return 1-> exists like -> unlike
         *          return 2-> save like
         *          return 0->not exists value request
         *          */
        public function addLike($request){
            if(isset($request['user_id'])&&isset($request['status_id'])){
                $user_id=$request['user_id'];
                $status_id=$request['status_id'];
                //return $this->find('all');
                if($user_id!=NULL&&$status_id!=NULL){
                    $check_exists=$this->find('all',array(
                       'conditions'=>array('LikeStatus.user_id'=>$user_id,'LikeStatus.status_id'=>$status_id) 
                    ));
                    if(count($check_exists)>0){
                        $this->id=$check_exists[0]['LikeStatus']['id'];
                        $this->delete();
                        return 1;
                    }else
                         if($this->save($request)){
                             $this->_saveActivity($user_id);
                            return 2;
                        }else
                            return 0;
                }
            }
            return 0;
        }
        // change 8,6
        private function _saveActivity($user_id){
            $like=$this->find('all',array(
               'conditions'=>array('LikeStatus.user_id'=>$user_id),
               'limit'=>1,
               'order'=>array('like_time'=>'DESC')
            ));
            $model_activity=classRegistry::init('Activity');
            $model_activity->save(array('user_id'=>$user_id,'category_id'=>2,'event_id'=>1,
            'activity_id'=>$like[0]['LikeStatus']['id'],'content'=>$like[0]['Status']['content']));
        }

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
        public $belongsTo=array(
            'Status'=>array(
                'className'=>'Status',
                'foreignKey'=>'status_id'
            )
        );
}
