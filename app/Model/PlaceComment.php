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
            ),
        );
        //get comment of id place
        public function getComments($arr_request){
            if(isset($arr_request['id_place'])&&isset($arr_request['limit'])){
                $arr_comment=  $this->find('all',array(
                    'conditions'=>array('place_id'=>$arr_request['id_place'])
                    
                ));
               // pr(count($arr_comment));
               // return count($arr_comment);
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
        
}
