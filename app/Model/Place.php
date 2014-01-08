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
            return $arr_place;
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
}
