<?php
App::uses('AppModel', 'Model');
/**
 * Rate Model
 *
 */
class Rate extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'rate';

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
        public function rating($request){
            if(isset($request['user_id'])&&isset($request['num_rate'])&&isset($request['place_id'])){
                $user_id=$request['user_id'];
                $num_rate=$request['num_rate'];
                $place_id=$request['place_id'];
                $check_exists=  $this->find('all',array(
                   'conditions'=>array('user_id'=>$user_id,'place_id'=>$place_id) 
                ));
                if($check_exists!=NULL){
                    //save activity
                    $this->id=$check_exists[0]['Rate']['id'];
                    $this->save($request);
                    //match
                    $this->setRatePlace($place_id);
                    return 2;
                    
                }else{
                    if($this->save($request)){
                        return 1;
                    }
                }
            }
            return 0;
        }
        private function setRatePlace($place_id){
             $arr_rate=  $this->find('all',array(
                        'conditions'=>array('place_id'=>$place_id)
             ));
             //pr($arr_rate);
             //$average=
             $sum=0;
             for($i=0;$i<count($arr_rate);$i++){
                 $sum=$sum+$arr_rate[$i]['Rate']['num_rate'];
             }
             $average=$sum/count($arr_rate);
             $this->update_rate_place($place_id,$average);
        }
        
        private function update_rate_place($place_id,$average){
            $model_place=ClassRegistry::init('Place');
            $place=  $model_place->find('all',array(
                'conditions'=>array('place.id'=>$place_id),
                'recursive'=>-1
            ));
            //pr($place);
            if($place!=NULL){
                $model_place->id=$place_id;
               // if($model_place->set('rate')){
                $model_place->set('rate',$average);
                $model_place->save();
               // }
            }
        }
        
        //functions for algorithms matching
        //rate high of user
        public function a1_getTopHighRateOfUser($user_id,$rate){
            $place_rate=array();
            $top_rate=  $this->find('all',array(
                'conditions'=>array('user_id'=>$user_id,'num_rate >='=>2.5)
            ));
            if(count($top_rate)>0){
                for($i=0;$i<count($top_rate);$i++){
                    $place_rate[$i]['place_id']=$top_rate[$i]['Rate']['place_id'];
                    $place_rate[$i]['rate']=$rate;
                }
            }
            return $place_rate;
        }
}
