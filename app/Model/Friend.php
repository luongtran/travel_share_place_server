<?php
App::uses('AppModel', 'Model');
/**
 * Friend Model
 *
 */

class Friend extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'friend';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        public $belongsTo=array(
            'User'=>array(
                'className'=>'User',
                'foreignKey'=>'user_id'
            )
        );
        public $hasMany =array(
            'User'=>array(
                'className'=>'User',
                'foreignKey'=>'id'
            ),
        );
        public function  getListFriend($request){
            $friends_id=array();
            //$friends=array();
            if(isset($request['user_id'])){
                if($request['user_id']!=NULL){
                    $arr_friend1=  $this->find('all',array(
                       'conditions'=>array('user_id'=>$request['user_id']),
                        'recursive'=>-1
                    ));
                    //if($arr_friend==NULL){
                        $arr_friend2=  $this->find('all',array(
                       'conditions'=>array('friend_id'=>$request['user_id']),
                        'recursive'=>-1
                    ));
                   // }
                    if($arr_friend1!=NULL){
                        for($i=0;$i<count($arr_friend1);$i++){
                            array_push($friends_id,$arr_friend1[$i]['Friend']['friend_id']);
                        }
                    }
                    if($arr_friend2!=NULL){
                        for($i=0;$i<count($arr_friend2);$i++){
                            array_push($friends_id,$arr_friend2[$i]['Friend']['user_id']);
                        }
                    }
                  // pr($friends_id);
                   if($friends_id!=NULL)
                    return $this->getUsers($friends_id);
                   else
                       return 1;
                }
            }
//            $model_User=classRegistry::init('User');
//            $users=$model_User->find('all');
//            
            return 0;
        }
        public function getUsers($friends_id){
            $model_user=classRegistry::init('User');
            $list_friend=array();
            for($i=0;$i<count($friends_id);$i++){
                $users=$model_user->find('all',array(
                    'conditions'=>array('id'=>$friends_id[$i]),
                    'recursive'=>-1
                ));
                //pr($users);
                array_push($list_friend, $users[0]['User']);
            }
            return $list_friend;
        }
}
