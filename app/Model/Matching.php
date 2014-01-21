<?php
App::uses('AppModel', 'Model');
App::uses('TreeNode','Lib');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ID3
 *
 * @author Administrator
 */
class Matching extends AppModel{
    //put your code here
    public $useTable=false;
    public function matching($request){
        $rate_places=array();
        
        if(isset($request['user_id'])){
            if($request['user_id']!=NULL){
                
                $user_id=$request['user_id'];
                
                $model_user=classRegistry::init('User');
                $district_id=$model_user->getIdDistrictByIdUser($user_id);
                
                $model_place=classRegistry::init('Place');
                $places=$model_place->getPlaces();
                
                $model_favorite=classRegistry::init('PlaceFavorite');
                
                $model_comment_place=classRegistry::init('PlaceComment');
                
                $model_view=classRegistry::init('ViewPlace');
                
                // short-listed place for rate
                // /*
                // top 10-20 place high like 
                // top 10-20 place high view
                // top 10-20 place high rate
                // places same type  place  favorite of user that
                // places same type place favorite friends of user that
                // ******
                // rate: 
                //  - comment place lately
                //  - like place lately
                //  - high view lately
                //  - many people place
                // */
                //return $places;
                for($i=0;$i<count($places);$i++){
                    $rate=0;
                    $place_id=$places[$i]['id'];
//                    if($model_place->a_checkPlaceByDistrict($district_id,$place_id,$places)==1){
//                        $rate=$rate+3;
//                    }
//                    if($model_place->a_checkPlaceHasPromotion($place_id,$places)==1){
//                        $rate=$rate+2;
//                    }
                    //top 5
                    if($model_place->a_checkHighRates($place_id)==1){
                        $rate=$rate+2;
                    }
//                    if($model_place->a_checkPlaceHighLike($place_id)==1){
//                        $rate=$rate+1;
//                    }
//                    if($model_place->a_checkPlaceHighView($place_id)==1){
//                        $rate=$rate+1;
//                    }
//                    if($model_favorite->a_checkSameTypePlaceFavorite($user_id,$place_id)==1){
//                        $rate=$rate+2;
//                    }
//                    if($model_favorite->a_checkPlaceFriendFavorite($user_id,$place_id)==1){
//                        $rate=$rate+1;
//                    }
//                    if($model_comment_place->a_CheckPlaceManyComment($place_id)==1){
//                        $rate=$rate+1;
//                    }
//                    if($model_view->a_checkHighViewPlaceOfUser($user_id,$place_id)==1){
//                        $rate=$rate+1;
//                    }
//                    if($model_place->a_checkPlaceSameTypePlaceHighView($user_id,$place_id)==1){
//                        $rate=$rate+2;
//                    }
                    
                    $rate_places[$i]['Place_id']=$place_id;
                    $rate_places[$i]['rate']=$rate;
                }
                
                $rate_places=$this->_sortDownRate($rate_places);
                
                $this->saveFollow($user_id,$rate_places);
                
                return $rate_places;
            }
        }
        return 0;
    }
    
   // sort place
    private function _sortDownRate($rate_place){
        $tmp=array();
        for($i=0;$i<count($rate_place);$i++){
            for($j=$i;$j<count($rate_place);$j++){
                if($rate_place[$i]['rate']<$rate_place[$j]['rate']){
                    //to permute
                    $tmp[$i]['Place_id']=$rate_place[$i]['Place_id'];
                    $tmp[$i]['rate']=$rate_place[$i]['rate'];
                    
                    $rate_place[$i]['Place_id']=$rate_place[$j]['Place_id'];
                    $rate_place[$i]['rate']=$rate_place[$j]['rate'];
                    
                    $rate_place[$j]['Place_id']=$tmp[$i]['Place_id'];
                    $rate_place[$j]['rate']=$tmp[$i]['rate'];
                    
                }
            }
        }
        return $rate_place;
    }
    public function saveFollow($user_id,$rate_places){
        $model_follow=classRegistry::init('Follow');
        $model_follow->deleteAll(array('user_id'=>$user_id));
        //pr($rate_places);
        
        for($i=0;$i<2;$i++){ //top2
            $model_follow->create();
            $model_follow->save(array('user_id'=>$user_id,'place_id'=>$rate_places[$i]['Place_id'],'follow_time'=>getdate()));
        }
    }

    public function getPlacesMatching($request){
        $result_places=array();
        $places_matching=  $this->matching($request);
        $model_place=classRegistry::init('Place');
        $places=$model_place->find('all');
        for($i=0;$i<2;$i++){ //top 2
            
            $place=$model_place->find('all',array(
                'conditions'=>array('Place.id'=>$places_matching[$i]['Place_id']),
                'recursive'=>-1
            ));
            array_push($result_places, $place[0]['Place']);
        }
       //pr($result_places);
        return $result_places;
    }
}