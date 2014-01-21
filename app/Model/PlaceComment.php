<?php
App::uses('AppModel', 'Model');
/**
 * PlaceComment Model
 *
 */
class PlaceComment extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'place_comment';
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
        //get comment of id place
        public function getComments($arr_request){
            if(isset($arr_request['id_place'])&&isset($arr_request['limit'])){
                $arr_comment=  $this->find('all',array(
                    'conditions'=>array('place_id'=>$arr_request['id_place'])
                    
                ));
                if(count($arr_comment)<$arr_request['limit']){
                    return 2;
                }
                $arr_comment=  $this->find('all',array(
                    'conditions'=>array('place_id'=>$arr_request['id_place']),
                    'order'=>array('PlaceComment.id'=>'DESC'),
                    'limit'=>$arr_request['limit']
                ));
                $arr=array();
                for($i=0;$i<count($arr_comment);$i++){
                    $arr[$i]['id']=$arr_comment[$i]['PlaceComment']['id'];
                    $arr[$i]['email']=$arr_comment[$i]['User']['email'];
                    $arr[$i]['comment_time']=$arr_comment[$i]['PlaceComment']['comment_time'];
                    $arr[$i]['message']=$arr_comment[$i]['PlaceComment']['message'];
                    $arr[$i]['place_id']=$arr_comment[$i]['PlaceComment']['place_id'];
                    $arr[$i]['c_status']=$arr_comment[$i]['PlaceComment']['c_status'];
                    $arr[$i]['user_id']=$arr_comment[$i]['PlaceComment']['user_id'];
                    $arr[$i]['avarta']=$arr_comment[$i]['User']['avarta'];
                }
                //pr($arr);
               // pr($this->convertPlaceComment_json($arr_comment));
                if($arr_comment!=null)
                    //return $this->convertPlaceComment_json($arr_comment);
                    return $arr;
                else
                    return 0;
            }else
                return 0;
        }
        
        private function convertPlaceComment_json($arr_comment){
            $arr_convert=array();
            for($i=0;$i<count($arr_comment);$i++){
                array_push($arr_convert,$arr_comment[$i]['PlaceComment']);
                array_push($arr_convert,$arr_comment[$i]['User']);
            }
            return $arr_convert;
        }
        
        //save comment
        public function saveComment($request){
            if(isset($request['user_id'])&&isset($request['place_id'])&&isset($request['message'])){
                if($request['user_id']!=NULL&&$request['place_id']!=NULL&&$request['message']){
                     if($this->save($request)){
                         $user_id=$request['user_id'];
                         $place_id=$request['place_id'];
                        $comment=  $this->find('all',array(
                            'conditions'=>array('user_id'=>$user_id,'place_id'=>$place_id),
                            'limit'=>1,
                            'order'=>array('comment_time'=>'DESC')
                        ));
                        $this->_saveActivityCommentPlace($user_id,$place_id,$request['message'],$comment[0]['PlaceComment']['id']);
                        return 1;
                    }
                }
            }
            return 0;
        }
        private function _saveActivityCommentPlace($user_id,$place_id,$content,$activity_id){
            if($user_id!=NULL&&$place_id!=NULL&&$content!=NULL){
                $model_activity=classRegistry::init('Activity');
                if($model_activity->save(array('user_id'=>$user_id,'place_id'=>$place_id,'category_id'=>1,
                    'event_id'=>3,'activity_id'=>$activity_id,'content'=>$content))){
                    return 1;
                }
            }
            return 0;
        }
        /*

         * function of algorithms matching         */
        public function a_CheckPlaceManyComment($id_place){
            $comments=  $this->find('all',array(
                
                'group'=>array('place_id'),
                'order'=>array('count(place_id) DESC'),
                'limit'=>2
                
            ));
            //return $comments;
            if(count($comments)!=0){
                for($i=0;$i<count($comments);$i++){
                    if($comments[$i]['PlaceComment']['place_id']==$id_place){
                        return 1;
                    }
                }
            }
            return 0;
        }
        
}
