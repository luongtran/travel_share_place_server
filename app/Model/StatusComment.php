<?php
App::uses('AppModel', 'Model');
/**
 * StatusComment Model
 *
 */
class StatusComment extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'status_comment';

/**
 * Display field
 *
 * @var string
 */
        
	public $displayField = 'id';
        
        public function getCommentById($request){
            $cm_status=array();
            if(isset($request['status_id'])){
                $status_id=$request['status_id'];
                if($status_id!=NULL){
                    $status=$this->find('all',array(
                       'conditions'=>array('status_id'=>$status_id),
                        'order'=>array('comment_time'=>'DESC')
                    ));
                    if(count($status)>0){
                        $model_user=classRegistry::init('User');
                        for($i=0;$i<count($status);$i++){
                            $user=$model_user->find('all',array(
                               'conditions'=>array('User.id'=>$status[$i]['StatusComment']['user_id']) 
                            ));
                            $cm_status[$i]['avarta']=$user[0]['User']['avarta'];
                            $cm_status[$i]['user_name']=$user[0]['User']['user_name'];
                            $cm_status[$i]['id']=$status[$i]['StatusComment']['id'];
                            $cm_status[$i]['status_id']=$status[$i]['StatusComment']['status_id'];
                            $cm_status[$i]['user_id']=$status[$i]['StatusComment']['user_id'];
                            $cm_status[$i]['comment_time']=$status[$i]['StatusComment']['comment_time'];
                            $cm_status[$i]['message']=$status[$i]['StatusComment']['message'];
                            $cm_status[$i]['user_id']=$status[$i]['StatusComment']['user_id'];
                            //array_push($cm_status, $status[$i]['StatusComment']);
                        }
                        return $cm_status;
                    }else
                        return 1;
                }
            }
            return 0;
        }
        //add comment
        public function addComment($request){
            if(isset($request['user_id'])&&isset($request['status_id'])&&isset($request['message'])){
                $user_id=$request['user_id'];
                $status_id=$request['status_id'];
                $message=$request['message'];
                if($user_id!=NULL&&$status_id!=NULL&&$message!=NULL){
                    if($this->save($request)){
                        return 1;
                    }else
                        return 0;
                }
            }
            return 0;
        }
}
