<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'user';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        //relationship
        public $belongsTo=array(
            'relationship'=>array(
                'className'=>'Relationship',
                'foreignKey'=>'relationship_id'
            ),
            'education'=>array(
                'className'=>'Education',
                'foreignKey'=>'education_id'
            ),
            'decentralization'=>array(
                'className'=>'Decentralization',
                'foreignKey'=>'decentralization_id'
            ),
            'friend'=>array(
                'className'=>'Friend',
                'foreignKey'=>'id'
            )
        );
        public $hasMany =array(
            'Image'=>array(
                'className'=>'Image',
                'foreignKey'=>'user_id'
            ),
            'PlaceFavorite'=>array(
                'className'=>'PlaceFavorite',
                'foreignKey'=>'user_id'
            ),
            'activity'=>array(
                'className'=>'Activity',
                'foreignKey'=>'user_id'
            ),
            'shareplace'=>array(
                'className'=>'SharePlace',
                'foreignKey'=>'user_id'
            ),
            'friend'=>array(
                'className'=>'Friend',
                'foreignKey'=>'user_id'
            ),
            'PlaceComment'=>array(
                'className'=>'PlaceComment',
                'foreignKey'=>'user_id'
            )
            
            
        );
        
        public function profile($user_id){
            if(isset($user_id['user_id'])){
                $user=  $this->find('all',array(
                    'recursive'=>-1,
                    'conditions'=>array('id'=>$user_id['user_id'])
                ));
               
                if($user==NULL){
                    return 0;
                }else
                    return $user[0]['User'];
            }
            return 0;
        }

        public function login($account){
           // pr($account);
            if(isset($account['email'])&&isset($account['pass'])){
                $email=$account['email'];
                $pass=$account['pass'];
                $ac=  $this->find('all',array(
                    'conditions'=>array('email'=>$email,'password'=>$pass),
                    'recursive'=>-1
                ));
                //pr($ac);
                //echo $ac[0]['User']['id'];
                if($ac==NULL)
                    return 0;
                else
                    return $ac[0]['User']['id'];
                
            }
            return 0;
        }
        /*
            register account user
         * if exist email return 0
         * if register success return 1
         * if register fail return 2
         *          */
        public function model_register($arr_post){
            $record=  $this->find('all',array(
               'conditions'=>array('email'=>$arr_post['email']) 
            ));
            if($record){
                return 0;
            }else{
                if($this->save($arr_post)){
                    return 1;
                }
            }
            return 3;
        }
        public function getEmail($arr_request){
            if(isset($arr_request['user_id'])){
                $arr_user=  $this->find('all',array(
                    'conditions'=>array('id'=>$arr_request['user_id']),
                    'recursive'=>-1
                ));
                if($arr_user!=null)
                    return $arr_user[0]['User']['email'];
                else
                    return 0;
            }
            return 0;
        }
}
