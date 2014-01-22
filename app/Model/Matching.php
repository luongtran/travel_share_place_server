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
    //get Places demand forecasting
    public function matching_vs2($request,$places,$top){
         if(isset($request['user_id'])){
            if($request['user_id']!=NULL){
                $user_id=$request['user_id'];
                
                //init model
                $model_user=classRegistry::init('User');
                $district_id=$model_user->getIdDistrictByIdUser($user_id);
                
                $model_place=classRegistry::init('Place');
                //$places=$model_place->getPlaces();
                
                $model_favorite=classRegistry::init('PlaceFavorite');
                
                $model_comment_place=classRegistry::init('PlaceComment');
                $model_like_place=classRegistry::init('LikePlace');
                
                $model_view=classRegistry::init('ViewPlace');
                
                $total_places=array();
                //rate places
                //(district_id,arr place,rate)
                //return places same district vs distric of user
                $placeSameDistrict=$model_place->a1_allPlaceByDistrict($district_id,$places,3);
                $total_places= $this->totalRatePlaces($total_places,$placeSameDistrict);
                
                //($arr places,$rate)
                //return places has promotion
                $placePromotion=$model_place->a1_allPlaceByPromotion($places,2);
                $total_places=$this->totalRatePlaces($total_places,$placePromotion);
                
                //(rate,top)
                //return places many people rate (get top and rate up 2.5)
                $placeHighRate=$model_place->a1_allPlaceHighRates(1,2);
                $total_places=$this->totalRatePlaces($total_places,$placeHighRate);
                
                //(rate,top)
                //return places many people like (get top)
                $placeHighLike=$model_place->a1_allPlaceHighLike(1,2);
                $total_places=$this->totalRatePlaces($total_places,$placeHighLike);
                
                 //(rate,top)
                //return places many people view (get top)
                $placeHighView=$model_place->a1_allPlaceHighView(1,2);
                $total_places=$this->totalRatePlaces($total_places,$placeHighView);
                
                //($user_id,$places,$rate)
                //return places favorite of user
                $placefavorite_u=$model_favorite->a1_placeFavoriteOfUser($user_id,$places,3);
                $total_places=$this->totalRatePlaces($total_places,$placefavorite_u);
                
                //(user_id,rate,top)
                //return top places user comment many
                $placeHighComment_u=$model_comment_place->a1_getPlaceHighCommentOfUser($user_id,2,2);
                $total_places=$this->totalRatePlaces($total_places,$placeHighComment_u);
                
                 //(user_id,rate,top)
                //return top places user likes many (order time like)
                $placeHighLike_u=$model_like_place->a1_getPlaceLikeOfUser($user_id,2,2);
                $total_places=$this->totalRatePlaces($total_places,$placeHighLike_u);
                
                //(user_id,rate,top)
                //return top places view likes many
                $placeHighView_u=$model_view->a1_allTopPlaceUserView($user_id,2,2);
                $total_places=$this->totalRatePlaces($total_places,$placeHighView_u);
                
                //($user_id,$places,$rate,$top)
                //return top view places same type places favorite
                $placeHighFavoriteView_u=$model_favorite->a1_PlaceViewHighSameTypeFavorite($user_id,$places,2,2);
                $total_places=$this->totalRatePlaces($total_places,$placeHighFavoriteView_u);
                
                //($user_id,$places,$rate,$top)
                //return top like places same type places favorite
                $placeHighFavoriteLike_u=$model_favorite->a1_PlaceLikeHighSameTypeFavorite($user_id,$places,2,2);
                $total_places=$this->totalRatePlaces($total_places,$placeHighFavoriteLike_u);
                
                //($user_id,$places,$rate,$top)
                //return top rate (rate>2.5) places same type places favorite
                $placeHighFavoriteRate_u=$model_favorite->a1_PlaceRateHighSameTypeFavorite($user_id,$places,2,2);
                $total_places=$this->totalRatePlaces($total_places,$placeHighFavoriteRate_u);
                /*additional rate*/
                
                $sortPlaceMatching=$this->_sortDownRateVs2($total_places);
                //add follow
                $this->saveFollow($user_id,$sortPlaceMatching,$top);
               //order 
                return $sortPlaceMatching;
                //return $total_places;
            }
         }
    }
    //total rate functions matching
    public function totalRatePlaces($arr_total,$places){
        $ar_place=array();
        $test=array();
        if(count($arr_total)>0){
            if(count($places)>0){
                //add rate
                for($i=0;$i<count($arr_total);$i++){
                    for($j=0;$j<count($places);$j++){
                        if($arr_total[$i]['place_id']==$places[$j]['place_id']){
                            $arr_total[$i]['rate']=$arr_total[$i]['rate']+$places[$j]['rate'];
                            array_push($ar_place,$places[$j]['place_id']);
                        }
                    }
                }
                //add item into $ar_total
                for($j=0;$j<count($places);$j++){
                    $tmp=0;
                    for($k=0;$k<count($ar_place);$k++){
                        if($places[$j]['place_id']==$ar_place[$k]){
                            $tmp++;
                        }
                    }
                    if($tmp==0){
                        array_push($arr_total, $places[$j]);
                    }
                }
            }else
                return $arr_total;
        }else{
            $arr_total=$places;
        }
        return $arr_total;
    }
    
//order matching
    private function _sortDownRateVs2($rate_place){
        $tmp=array();
        for($i=0;$i<count($rate_place);$i++){
            for($j=$i;$j<count($rate_place);$j++){
                if($rate_place[$i]['rate']<$rate_place[$j]['rate']){
                    //to permute
                    $tmp[$i]['place_id']=$rate_place[$i]['place_id'];
                    $tmp[$i]['rate']=$rate_place[$i]['rate'];
                    
                    $rate_place[$i]['place_id']=$rate_place[$j]['place_id'];
                    $rate_place[$i]['rate']=$rate_place[$j]['rate'];
                    
                    $rate_place[$j]['place_id']=$tmp[$i]['place_id'];
                    $rate_place[$j]['rate']=$tmp[$i]['rate'];
                    
                }
            }
        }
        return $rate_place;
    }
    
    //top rate place after matching 
    public function getPlaceAfterMatching($request,$top){
        $arr_place=array();
         $model_place=classRegistry::init('Place');
         $places=$model_place->getPlaces();
         $place_matching=  $this->matching_vs2($request,$places,$top);
         for($i=0;$i<count($places);$i++){
             for($j=0;$j<$top;$j++){
                 if($places[$i]['id']==$place_matching[$j]['place_id'])
                     array_push($arr_place, $places[$i]);
             }
         }
         return $arr_place;
    }
    public function saveFollow($user_id,$rate_places,$top){
        $model_follow=classRegistry::init('Follow');
        $model_follow->deleteAll(array('user_id'=>$user_id));
        //pr($rate_places);
        
        for($i=0;$i<$top;$i++){ //top2
            $model_follow->create();
            $model_follow->save(array('user_id'=>$user_id,'place_id'=>$rate_places[$i]['place_id'],'follow_time'=>getdate()));
        }
    }



//
//    public function matching($request){
//        $rate_places=array();
//        
//        if(isset($request['user_id'])){
//            if($request['user_id']!=NULL){
//                
//                $user_id=$request['user_id'];
//                
//                $model_user=classRegistry::init('User');
//                $district_id=$model_user->getIdDistrictByIdUser($user_id);
//                
//                $model_place=classRegistry::init('Place');
//                $places=$model_place->getPlaces();
//                
//                $model_favorite=classRegistry::init('PlaceFavorite');
//                
//                $model_comment_place=classRegistry::init('PlaceComment');
//                
//                $model_view=classRegistry::init('ViewPlace');
//                
//                // short-listed place for rate
//                // /*
//                // top 10-20 place high like 
//                // top 10-20 place high view
//                // top 10-20 place high rate
//                // places same type  place  favorite of user that
//                // places same type place favorite friends of user that
//                // ******
//                // rate: 
//                //  - comment place lately
//                //  - like place lately
//                //  - high view lately
//                //  - many people place
//                // */
//                //return $places;
//                
//                for($i=0;$i<count($places);$i++){
//                    $rate=0;
//                    $place_id=$places[$i]['id'];
////                    if($model_place->a_checkPlaceByDistrict($district_id,$place_id,$places)==1){
////                        $rate=$rate+3;
////                    }
////                    if($model_place->a_checkPlaceHasPromotion($place_id,$places)==1){
////                        $rate=$rate+2;
////                    }
//                    //top 5
//                    
//                    if($model_place->a_checkHighRates($place_id)==1){
//                        $rate=$rate+2;
//                    }
//                    
////                    if($model_place->a_checkPlaceHighLike($place_id)==1){
////                        $rate=$rate+1;
////                    }
////                    if($model_place->a_checkPlaceHighView($place_id)==1){
////                        $rate=$rate+1;
////                    }
////                    if($model_favorite->a_checkSameTypePlaceFavorite($user_id,$place_id)==1){
////                        $rate=$rate+2;
////                    }
////                    if($model_favorite->a_checkPlaceFriendFavorite($user_id,$place_id)==1){
////                        $rate=$rate+1;
////                    }
////                    if($model_comment_place->a_CheckPlaceManyComment($place_id)==1){
////                        $rate=$rate+1;
////                    }
////                    if($model_view->a_checkHighViewPlaceOfUser($user_id,$place_id)==1){
////                        $rate=$rate+1;
////                    }
////                    if($model_place->a_checkPlaceSameTypePlaceHighView($user_id,$place_id)==1){
////                        $rate=$rate+2;
////                    }
//                    
//                    $rate_places[$i]['Place_id']=$place_id;
//                    $rate_places[$i]['rate']=$rate;
//                }
//                
//                $rate_places=$this->_sortDownRate($rate_places);
//                
//                $this->saveFollow($user_id,$rate_places);
//                
//                return $rate_places;
//            }
//        }
//        return 0;
//    }
//    
//   // sort place
//    private function _sortDownRate($rate_place){
//        $tmp=array();
//        for($i=0;$i<count($rate_place);$i++){
//            for($j=$i;$j<count($rate_place);$j++){
//                if($rate_place[$i]['rate']<$rate_place[$j]['rate']){
//                    //to permute
//                    $tmp[$i]['Place_id']=$rate_place[$i]['Place_id'];
//                    $tmp[$i]['rate']=$rate_place[$i]['rate'];
//                    
//                    $rate_place[$i]['Place_id']=$rate_place[$j]['Place_id'];
//                    $rate_place[$i]['rate']=$rate_place[$j]['rate'];
//                    
//                    $rate_place[$j]['Place_id']=$tmp[$i]['Place_id'];
//                    $rate_place[$j]['rate']=$tmp[$i]['rate'];
//                    
//                }
//            }
//        }
//        return $rate_place;
//    }
    
    
//
//    public function getPlacesMatching($request){
//        $result_places=array();
//        $places_matching=  $this->matching($request);
//        $model_place=classRegistry::init('Place');
//        $places=$model_place->find('all');
//        for($i=0;$i<2;$i++){ //top 2
//            
//            $place=$model_place->find('all',array(
//                'conditions'=>array('Place.id'=>$places_matching[$i]['Place_id']),
//                'recursive'=>-1
//            ));
//            array_push($result_places, $place[0]['Place']);
//        }
//       //pr($result_places);
//        return $result_places;
//    }
}