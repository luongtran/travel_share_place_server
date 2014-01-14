<?php
App::uses('AppModel', 'Model');
/**
 * LikePlace Model
 *
 */
class LikePlace extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'like_place';

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
        public function storeLike($request){
        
            if(isset($request['user_id'])&&isset($request['place_id'])){
                if($request['user_id']!=NULL && $request['place_id']!=NULL){
                    $user_id=$request['user_id'];
                    $place_id=$request['place_id'];
                    $like=  $this->find('all',array(
                        'conditions'=>array('user_id'=>$user_id,'place_id'=>$place_id)
                    ));
                    if($like==NULL){
                       $this->save($request);
                       return $this->updateNumLikePlace($place_id,1);
                    }else{
                        
                        $this->id=$like[0]['LikePlace']['id'];
                        $this->delete();
                        return $this->updateNumLikePlace($place_id,0);;
                    }
                        
                }
            }   
            return 0;
        }
        private function updateNumLikePlace($place_id,$discrimination){
            $model_place=classRegistry::init('Place');
            $place=$model_place->find('all',array(
                'conditions'=>array('Place.id'=>$place_id),
                'recursive'=>-1
            ));
            $model_place->id=$place_id;
            if($discrimination==1){
                $model_place->saveField('p_like',$place[0]['Place']['p_like']+1);
                return $place[0]['Place']['p_like']+1;
            }
            else{
                $model_place->saveField('p_like',$place[0]['Place']['p_like']-1);
                return $place[0]['Place']['p_like']-1;
            }
        }
        
}
