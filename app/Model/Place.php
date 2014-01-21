<?php
App::uses('AppModel', 'Model');
App::uses('GeocodeLib', 'Tools.Lib');

/**
 * Place Model
 *
 */
class Place extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
    
	public $useTable = 'place';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        public $belongsTo=array(
            'TPlace'=>array(
                'className'=>'TPlace',
                'foreignKey'=>'tplace_id'
            ),
            'District'=>array(
                'className'=>'District',
                'foreignKey'=>'district_id'
            ),
        );
         public $hasMany =array(
            'Image'=>array(
                'className'=>'Image',
                'foreignKey'=>'place_id'
            ),
            'PlaceFavorite'=>array(
                'className'=>'PlaceFavorite',
                'foreignKey'=>'place_id'
            ), 
             'SharePlace'=>array(
                'className'=>'SharePlace',
                'foreignKey'=>'place_id'
            ), 
            'Follow'=>array(
                'className'=>'Follow',
                'foreignKey'=>'place_id'
            )
        );
        public function getPlaces(){
            $arr=  $this->find('all',array(
               'recursive'=>-1 
            ));
            $arr_places=array();
            for($i=0;$i<count($arr);$i++){
                array_push($arr_places,$arr[$i]['Place']);
            }
            return $arr_places;
        }

        public function getPlaceFromID($arr){
            //echo 'aaa';
            //die();
            $arr_place=array();
            if (!$this->exists($arr['place_id'])) {
		$arr_place=array(0);	
            }else{
                $arr_place=$this->find('all',array(
                    'recursive'=>-1,
                    'conditions'=>array('id'=>$arr['place_id'])
                ));
            }
            //pr($arr_place[0]['Place']);
            return $arr_place[0]['Place'];
        }
        /*
         * input lat,lng,distance from client (mobile)
         * output list places with distance greater than or equal
         *          */
        
        public function getPlaceByDistance($arr_lat_lng){ //input lat_lng vs distance (3 get)
            $arr_place_bydistance=array();
            if(isset($arr_lat_lng['lat'])&&isset($arr_lat_lng['lng'])&&isset($arr_lat_lng['distance'])){
                $get_lat=$arr_lat_lng['lat'];
                $get_lng=$arr_lat_lng['lng'];
                $get_distance=$arr_lat_lng['distance'];
            
                $arr_all_place=  $this->find('all',array(
                    'recursive'=>-1
                ));
                $this->Geocode = new GeocodeLib();
                for($i=0;$i<count($arr_all_place);$i++){
                    $db_lat=$arr_all_place[$i]['Place']['latitude'];
                    $db_lng=$arr_all_place[$i]['Place']['longitude'];
                    $pointOne=array('lat'=>$get_lat,'lng'=>$get_lng); //get request from clien (mobile) 
                    $pointTwo=array('lat'=>$db_lat,'lng'=>$db_lng); //get from database to equal
                    $re_distance= $this->Geocode->distance($pointOne, $pointTwo);
                    //echo $arr_all_place[$i]['Place']['place_name'].' is '.$re_distance.' $$ ';
                    if($re_distance<=$get_distance){ // distance = 80
                        array_push($arr_place_bydistance,$arr_all_place[$i]['Place']);
                    }
                    
                }
            }
            //pr($arr_place_bydistance);
            return $arr_place_bydistance;
        }
        
        //check place_id same district_id
        // use in algorithms matching
        public function a_checkPlaceByDistrict($distric_id,$place_id,$places){
              for($i=0;$i<count($places);$i++){
                  if($places[$i]['id']==$place_id&&$places[$i]['district_id']==$distric_id){
                      return 1;
                  }
              }
              return 0;
//            $place=  $this->find('all',array(
//               'conditions'=>array('district_id'=>$distric_id,'Place.id'=>$place_id) 
//            ));
//            if(count($place)==1){
//                return 1;
//            }
//            return 0;
        }
        //check place_id same promotion
        public function a_checkPlaceHasPromotion($place_id,$places){
               for($i=0;$i<count($places);$i++){
                   if($places[$i]['id']==$place_id&&$places[$i]['promotion']==1){
                       return 1;
                   }
               }
               return 0;
//            $place=  $this->find('all',array(
//               'conditions'=>array('promotion'=>1,'Place.id'=>$place_id) 
//            ));
//            if(count($place)==1){
//                return 1;
//            }
//            return 0;
        }
        
        //check id_place have high rate in top 5
        //top 5.
        
        public function a_checkHighRates($id_place){
            $place=  $this->find('all',array(
               'order'=>array('rate'=>'DESC') ,
                'limit'=>2
            ));
            if(count($place)!=0){
                for($i=0;$i<count($place);$i++){
                    if($place[$i]['Place']['id']==$id_place){
                        return 1;
                    }
                }
            }
            return 0;
        }
        // not use in algorithms
        public function a_getAllPlaceSameType($type){
            $place=  $this->find('all',array(
               'conditions'=>array('tplace_id'=>$type) 
            ));
            return $place;
        }
        
        //check id_place have high like in top 5
        //top 5
        public function a_checkPlaceHighLike($id_place){
            $place=  $this->find('all',array(
               'order'=>array('p_like'=>'DESC') ,
                'limit'=>2
            ));
            if(count($place)!=0){
                for($i=0;$i<count($place);$i++){
                    if($place[$i]['Place']['id']==$id_place){
                        return 1;
                    }
                }
            }
            return 0;
        }
        //check id_place have high view in top 5
        //top 5
        public function a_checkPlaceHighView($id_place){
            $place=  $this->find('all',array(
               'order'=>array('p_view'=>'DESC'),
                'limit'=>2,
                'recursive'=>-1
            ));
            if(count($place)!=0){
                for($i=0;$i<count($place);$i++){
                    if($place[$i]['Place']['id']==$id_place){
                        return 1;
                    }
                }
                return 0;
            }
            return 0;
        }
        //check place_id in same type place with place user_id has num view high
        //
        public function a_checkPlaceSameTypePlaceHighView($user_id,$place_id){
            $model_view_place=classRegistry::init('ViewPlace');
            $view_place=$model_view_place->getViewPlaceHigh($user_id);
            $place=  $this->find('all',array(
               'conditions'=>array('Place.id'=>$place_id) 
            ));
            $places=  $this->find('all');
            if(count($view_place)!=0){
                for($i=0;$i<count($view_place);$i++){
                    for($j=0;$j<count($places);$j++){
                        if($view_place[$i]['ViewPlace']['place_id']==$places[$j]['Place']['id']){
                            if($places[$j]['Place']['tplace_id']==$place[0]['Place']['tplace_id']){
                                return 1;
                            }
                        }
                    }
                }
            }
            return 0;
        }
}
