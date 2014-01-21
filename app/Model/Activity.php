<?php
App::uses('AppModel', 'Model');
/**
 * Activity Model
 *
 */
class Activity extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'activity';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        
        public $belongsTo=array(
            'event'=>array(
                'className'=>'EventActivity',
                'foreignKey'=>'event_id'
            ),
            
            'user'=>array(
                'className'=>'User',
                'foreignKey'=>'user_id'
            ),
            'category'=>array(
                'className'=>'CategoryActivity',
                'foreignKey'=>'category_id'
            ),
            //....n
        );
        
        public function getAllActivity($request){
            
            if(isset($request['user_id'])){
                $user_id=$request['user_id'];
                if($request['user_id']!=NULL){
                    $model_friend=classRegistry::init('Friend');
                    $list_friend= $model_friend->getListFriend($request);
                    $list_activity=  $this->find('all',array(
                       'order'=>array('activity_time'=>'DESC')
                    ));
                    //return $list_activity;
                    $count=0;
                    $arr_activity=array();
                    //$model_event=classRegistry::init('EventActivity');
                    //$model_category=classRegistry::init('CategotyActivity');
                  // pr($this->find('all'));
                   // return $this->find('all');
                    //return $model_event->getNameEventById(6);
                    for($i=0;$i<count($list_activity);$i++){
                        for($j=0;$j<count($list_friend);$j++){
                            if($list_activity[$i]['Activity']['user_id']==$list_friend[$j]['id']){
                                //array_push($arr_activity,$count);
                                $arr_activity[$count]['id']=$list_activity[$i]['Activity']['id'];
                                $arr_activity[$count]['user_id']=$list_activity[$i]['Activity']['user_id'];
                                $arr_activity[$count]['category_id']=$list_activity[$i]['Activity']['category_id'];
                                $arr_activity[$count]['cate_name']=$list_activity[$i]['category']['cate_name'];
                                $arr_activity[$count]['event_id']=$list_activity[$i]['Activity']['event_id'];
                                $arr_activity[$count]['event_name']=$list_activity[$i]['event']['event_name'];
                                $arr_activity[$count]['activity_id']=$list_activity[$i]['Activity']['activity_id'];
                                $arr_activity[$count]['activity_time']=$list_activity[$i]['Activity']['activity_time'];
                                $arr_activity[$count]['content']=$list_activity[$i]['Activity']['content'];
                                $arr_activity[$count]['user_name']=$list_friend[$j]['user_name'];
                                $arr_activity[$count]['avarta']=$list_friend[$j]['avarta'];
                                $count++;
                            }
                        }
                    }
                    return $arr_activity;
                    
                }
            }
            return 0;
        }
       
}
