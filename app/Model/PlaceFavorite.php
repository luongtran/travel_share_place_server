<?php
App::uses('AppModel', 'Model');
/**
 * PlaceFavorite Model
 *
 */
class PlaceFavorite extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'place_favorite';

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
        /*
            input: request get including user_id and place id
         * output: return 0-> not request get
         *         return 1-> store favorite
         *         return 2 -> delete favorite
         *          */
        
        public function getFavorite($request){
            if(isset($request['user_id'])&& isset($request['place_id'])){
                if($request['user_id']!=NULL&&$request['place_id']!=NULL){
                    $user_id=$request['user_id'];
                    $place_id=$request['place_id'];
                    $check_exists=  $this->find('all',array(
                        'conditions'=>array('user_id'=>$user_id,'place_id'=>$place_id)
                    ));
                    if($check_exists!=NULL){
                        //delete
                        $this->id=$check_exists[0]['PlaceFavorite']['id'];
                        $this->delete();
                        return 2;
                    }else
                    {
                        if($this->save($request))
                            return 1;
                    }
                }
                
            }
            return 0;
        }
        
        //get places favorite of user
        /*

         * input : request get from client
         * output: return places favorite
         *          return 1 ->user is not favorite  
         *          return 2 ->not get from client       */
        public function getPlacesFavorite($request){
            $id_places=array();
            if(isset($request['user_id'])){
                if($request['user_id']!=NULL){
                    $user_id=$request['user_id'];
                    $favorites=  $this->find('all',array(
                         'conditions'=>array('user_id'=>$user_id)
                    ));
                    if($favorites!=NULL){
                        for($i=0;$i<count($favorites);$i++){
                            array_push($id_places,$favorites[$i]['PlaceFavorite']['place_id']);
                        }
                        return $this->_getPlaces($id_places);
                    }else
                        return 1;
                }
            }
            return 0;
        }
        //get places from arr id_place
        private function _getPlaces($id_places){
            $model_places= classRegistry::init('Place');
            $places_return=array();
            for($i=0;$i<count($id_places);$i++){
                $places=$model_places->find('all',array(
                    'recursive'=>-1,
                    'conditions'=>array('id'=>$id_places[$i])
                ));
                array_push($places_return,$places[0]['Place']);
            }
            return $places_return;
        }
        //algorithms check tplace_id of place_id same tplace_id of place favorite of user_id
        public function a_checkSameTypePlaceFavorite($user_id,$place_id){
            $favorite= $this->getPlacesFavorite(array('user_id'=>$user_id));
            if(count($favorite)!=0){
                $model_place=classRegistry::init('Place');
                $place=$model_place->find('all',array(
                     'conditions'=>array('Place.id'=>$place_id)
                 ));
                if(count($place)!=0){
                    for($i=0;$i<count($favorite);$i++){
                        if($favorite[$i]['tplace_id']==$place[0]['Place']['tplace_id']){
                            return 1;
                        }
                    }
                }
            }
            return 0;
        }
        //check place_id in place favorite of friend ?
        //use algorithms matching "a_"
        public function a_checkPlaceFriendFavorite($user_id,$place_id){
            $model_friend=classRegistry::init('Friend');
            //$friends=  $this->find('all');
            $friends=$model_friend->getListFriend(array('user_id'=>$user_id));
            $favorites=  $this->find('all',array(
               'conditions'=>array('place_id'=>$place_id)
            ));
            //return $friends;
            if(count($favorites)==0){
                return 0;
            }else{
                for($i=0;$i<count($favorites);$i++){
                    for($j=0;$j<count($friends);$j++){
                        if($favorites[$i]['PlaceFavorite']['user_id']==$friends[$j]['id']){
                            return 1;
                        }
                    }
                }
            }
            return 0;
        }
                
}
