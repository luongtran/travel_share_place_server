<?php
App::uses('AppModel', 'Model');
/**
 * Status Model
 *
 */
class Status extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'status';

/**
 * Display field
 *
 * @var string
 */
        
	public $displayField = 'id';
        public $belongsto=array(
            'User'=>array(
                'className'=>'User',
                'foreignKey'=>'user_id'
            ),
        );
        
        public function getStatus($request){
            if(isset($request['user_id'])){
                if($request['user_id']){
                    $status=  $this->find('all',array(
                        'conditions'=>array('user_id'=>$request['user_id']),
                        'order'=>array('status_time'=>'DESC'),
                        'limit'=>1
                    ));
                    if($status!=NULL)
                        return $status[0]['Status'];
                    else
                        return 0;
                }
            }
            return 0;
        }
        
        //activity personal page
        public function getStatusPersonalPage($request){
            $status_all=array();
             if(isset($request['user_id'])){
                if($request['user_id']){
                     $status=  $this->find('all',array(
                        'conditions'=> array('user_id'=>$request['user_id']),
                         'order'=>array('status_time'=>'DESC')
                     ));
                     $model_user=classRegistry::init('User');
                     $user=$model_user->find('all',array(
                         'conditions'=>array('id'=>$request['user_id']),
                         'recursive'=>-1
                     ));
                     for($i=0;$i<count($status);$i++){
                        $status_all[$i]['id']=$status[$i]['Status']['id'];
                        $status_all[$i]['content']=$status[$i]['Status']['content'];
                        $status_all[$i]['user_id']=$status[$i]['Status']['user_id'];
                        $status_all[$i]['status_time']=$status[$i]['Status']['status_time'];
                        $status_all[$i]['user_name']=$user[0]['User']['user_name'];
                        $status_all[$i]['avarta']=$user[0]['User']['avarta'];
                     }
                     if($status!=NULL){
                         return $status_all;
                     }else{
                         return 0;
                     }
                }
             
             }
             return 0;
        }
}
