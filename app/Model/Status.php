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
             if(isset($request['user_id'])&&isset($request['limit'])){
                if($request['user_id']&&$request['limit']!=NULL){
                    $status=  $this->find('all',array(
                       'conditions'=>array('user_id'=>$request['user_id'])
                    ));
                    $model_user=classRegistry::init('User');
                     $user=$model_user->find('all',array(
                         'conditions'=>array('id'=>$request['user_id']),
                         'recursive'=>-1
                     ));
                      $status=  $this->find('all',array(
                        'conditions'=> array('user_id'=>$request['user_id']),
                         'order'=>array('status_time'=>'DESC')
                     ));
                      $model_comment_status=classRegistry::init('StatusComment');
                      $model_like_status=classRegistry::init('LikeStatus');
                    if(count($status)<$request['limit']){
                        if(count($status)>0){
                            for($i=0;$i<count($status);$i++){
                        
                            $status_comment=$model_comment_status->find('all',array(
                                'conditions'=>array('status_id'=>$status[$i]['Status']['id'])
                            ));
                            $status_like=$model_like_status->find('all',array(
                                'conditions'=>array('status_id'=>$status[$i]['Status']['id'])
                            ));
                            $status_all[$i]['num_like']=  count($status_like);
                            $status_all[$i]['num_comment']=  count($status_comment);
                            $status_all[$i]['id']=$status[$i]['Status']['id'];
                            $status_all[$i]['content']=$status[$i]['Status']['content'];
                            $status_all[$i]['user_id']=$status[$i]['Status']['user_id'];
                            $status_all[$i]['status_time']=$status[$i]['Status']['status_time'];
                            $status_all[$i]['user_name']=$user[0]['User']['user_name'];
                            $status_all[$i]['avarta']=$user[0]['User']['avarta'];
                            $status_all[$i]['image_cover']=$user[0]['User']['image_cover'];
                           }
                        }else{
                            $status_all[0]['user_id']=$user[0]['User']['id'];
                            $status_all[0]['user_name']=$user[0]['User']['user_name'];
                            $status_all[0]['avarta']=$user[0]['User']['avarta'];
                            $status_all[0]['image_cover']=$user[0]['User']['image_cover'];
                        }
                        return $status_all;
                    }
                     $status=  $this->find('all',array(
                        'conditions'=> array('user_id'=>$request['user_id']),
                         'order'=>array('status_time'=>'DESC'),
                         'limit'=>$request['limit']
                     ));
                     
                     
                     for($i=0;$i<count($status);$i++){
                        
                        $status_comment=$model_comment_status->find('all',array(
                            'conditions'=>array('status_id'=>$status[$i]['Status']['id'])
                        ));
                        $status_like=$model_like_status->find('all',array(
                            'conditions'=>array('status_id'=>$status[$i]['Status']['id'])
                        ));
                        $status_all[$i]['num_like']=  count($status_like);
                        $status_all[$i]['num_comment']=  count($status_comment);
                        $status_all[$i]['id']=$status[$i]['Status']['id'];
                        $status_all[$i]['content']=$status[$i]['Status']['content'];
                        $status_all[$i]['user_id']=$status[$i]['Status']['user_id'];
                        $status_all[$i]['status_time']=$status[$i]['Status']['status_time'];
                        $status_all[$i]['user_name']=$user[0]['User']['user_name'];
                        $status_all[$i]['avarta']=$user[0]['User']['avarta'];
                        $status_all[$i]['image_cover']=$user[0]['User']['image_cover'];
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
        
        public function addStatus($request){
            if(isset($request['user_id'])&&isset($request['content'])){
                if($request['user_id']!=NULL&&$request['content']!=NULL){
                    if($this->save($request)){
                        $this->_saveActivity($request['user_id']);
                        return 1;
                    }else
                        return 0;
                }
            }
            return 0;
        }
        
        private function _saveActivity($user_id){
            $status=$this->find('all',array(
                            'conditions'=>array('user_id'=>$user_id),
                            'limit'=>1,
                            'order'=>array('status_time'=>'DESC')
                        ));
                        //pr($status);
                        $model_activity=classRegistry::init('Activity');
                        $model_activity->save(array('user_id'=>$user_id,'category_id'=>8,'event_id'=>6,
                            'activity_id'=>$status[0]['Status']['id'],'content'=>$status[0]['Status']['content']));
                        
        }

        public function deleteStatus($request){
            if(isset($request['status_id'])){
                $status_id=$request['status_id'];
                
                if($status_id!=NULL){
                    $this->id=$status_id;
                    if($this->delete()){
                        $model_comment_status=classRegistry::init('StatusComment');
                        $model_like_status=classRegistry::init('LikeStatus');
                        $model_comment_status->deleteAll(array('status_id'=>$status_id));
                        $model_like_status->deleteAll(array('status_id'=>$status_id));
                        return 1;
                    }
                    return 0;
                }
            }
            return 0;
        }
}
