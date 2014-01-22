<?php
App::uses('AppModel', 'Model');
/**
 * ViewPlace Model
 *
 */

class ViewPlace extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'view_place';

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
        // save num view of place (user_id)
        /*
         * output: 1 add view
         *          2 set view  
         *          0 not save view (not request or request empty)      */
        public function saveView($request){
            if(isset($request['user_id'])&&isset($request['place_id'])){
                if($request['user_id']!=NULL&&$request['place_id']!=NULL){
                    $user_id=$request['user_id'];
                    $place_id=$request['place_id'];
                    $check_extist=  $this->find('all',array(
                       'conditions'=>array('user_id'=>$user_id,'place_id'=>$place_id)
                    ));
                    if(count($check_extist)==0){
                        //add view
                        if($user_id!=0)
                            $this->save($request);
                        $this->_setViewPlace($place_id);
                        return 1;
                    }else
                    {
                        //set view
                        $this->id=$check_extist[0]['ViewPlace']['id'];
                        $this->saveField('view_count',$check_extist[0]['ViewPlace']['view_count']+1);
                        $this->_setViewPlace($place_id);
                        return 2;
                    }
                }
            }
            return 0;
        }
        /*
         * set p_view in tbl_place
         *          */
        private function _setViewPlace($place_id){
            $model_place=classRegistry::init('Place');
            $place=$model_place->find('all',array(
                'conditions'=>array('Place.id'=>$place_id)
            ));
            $model_place->id=$place_id;
            $model_place->saveField('p_view',$place[0]['Place']['p_view']+1);
        }
        
        // function check high view a place  of user_id  (for algorithms matching)
        public function a_checkHighViewPlaceOfUser($user_id,$place_id){
            $view_place=  $this->getViewPlaceHigh($user_id);
            if(count($view_place)!=0){
                for($i=0;$i<count($view_place);$i++){
                    if($view_place[$i]['ViewPlace']['place_id']==$place_id){
                        return 1;
                    }
                }
            }
            return 0;
        }
        
        //get view place has view high
        public function getViewPlaceHigh($user_id){
            $view_place=$this->find('all',array(
               'conditions'=>array('user_id'=>$user_id),
                'order'=>array('view_count'=>'DESC'),
                'limit'=>5
            ));
            return $view_place;
        }
        
        // change top 2
         // top user view places
        public function a1_allTopPlaceUserView($user_id,$rate,$top){
            $place_view=array();
            $top_places=  $this->find('all',array(
                'conditioms'=>array('user_id',$user_id),
                'order'=>array('view_count'=>'DESC'),
                'limit'=>$top
            ));
            if(count($top_places)>0){
                for($i=0;$i<count($top_places);$i++){
                    $place_view[$i]['place_id']=$top_places[$i]['ViewPlace']['place_id'];
                    $place_view[$i]['rate']=$rate;
                }
            }
            return $place_view;
        }
}
