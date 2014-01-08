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
class ID3 extends AppModel{
    //put your code here
    public $useTable=false;
    
    public function test(){
        return 'hoho';
    }
    public $arr_output=array('outlook'=>array(
       'Sunny'=>array('humidity'=>array('High'=>array('No'),
                                        'Normal'=>array('Yes'))),
        'Overcast'=>array('Yes'),
        'Rain'=>array('Wind'=>array('Strong'=>array('No'),
                                    'Weak'=>array('Yes')))
    ));
    public $features;
    public $circumstances = array();
    public $tfeatures;
    public $circumstanceFeatures;
    public $detailTFeatures;
    public $decisionTree;

    //init
    public function init() {
        $this->circumstances = ClassRegistry::init('Circumstance')->getAllCircumstance();
        $this->tfeatures = ClassRegistry::init('TFeature')->getAllTFeature();
        $this->features=  ClassRegistry::init('Feature')->getAllFeature();
        $this->circumstanceFeatures=  ClassRegistry::init('CircumstanceFeature')->getAllCircumstanceFeature();
        $this->detailTFeatures=  ClassRegistry::init('DetailTFeature')->getAllDetailTFeatures();
    }
    //get a circumstances from circumstance_id 
    public function getCircumstances($circumstance) {
        $arr_cir = $this->circumstances;
        $arr_acir = array();
        $count=0;
        for ($i = 0; $i < count($arr_cir); $i++) {
            if ($arr_cir[$i]['Circumstance']['id'] == $circumstance) {
                $arr_acir[$count]['Circumstance']['id'] = $arr_cir[$i]['Circumstance']['id'];
                $arr_acir[$count]['Circumstance']['content'] = $arr_cir[$i]['Circumstance']['content'];
                $count++;
            }
        }
        return $arr_acir;
    }
    //get Feature of a circumstance [tbl_circumstance_feature]
    public function getFeatures($circumstance) {
        $arr_cirfea=  $this->circumstanceFeatures;
        $arr_feas=  $this->features;
        $arr_fea=array();
        $count=0;
        for($i=0;$i<count($arr_cirfea);$i++){
            for($j=0;$j<count($arr_feas);$j++){
                if($arr_cirfea[$i]['CircumstanceFeature']['circumstance_id']==$circumstance){
                    if($arr_cirfea[$i]['CircumstanceFeature']['feature_id']==$arr_feas[$j]['Feature']['id']){
                        $arr_fea[$count]['Feature']['id']=$arr_feas[$j]['Feature']['id'];
                        $arr_fea[$count]['Feature']['f_name']=$arr_feas[$j]['Feature']['f_name'];
                        $count++;
                        
                    }
                }
                
            }
        }
        return $arr_fea;
    }
    // select tfeature from feature_id 
    public function getTFeatures($feature) {
        $arr=  $this->tfeatures;
        $arr_fea=array();
        $count=0;
        for($i=0;$i<count($arr);$i++){
            if($arr[$i]['TFeature']['feature_id']==$feature){
                $arr_fea[$count]['TFeature']['id']=$arr[$i]['TFeature']['id'];
                $arr_fea[$count]['TFeature']['f_name']=$arr[$i]['TFeature']['f_name'];
                $arr_fea[$count]['TFeature']['feature_id']=$arr[$i]['TFeature']['feature_id'];
                $count++;
            }
        }
        return $arr_fea;
    }
    //get name TFeature of tfeature_id
    public function getNameTFeature($tfeature_id) {
        //$arr_tfea = $this->TFeature->find('all');
        $arr_tfea=  $this->tfeatures;
        $name = '';
        for ($i = 0; $i < count($arr_tfea); $i++) {
            //echo 'ss'.$arr_tfea[$i]['TFeature']['f_name'];
            if ($arr_tfea[$i]['TFeature']['id'] == $tfeature_id) {
                $name = $arr_tfea[$i]['TFeature']['f_name'];
            }
        }
        return $name;
    }
    
    public function getDetailTFeatures($circumstance) {
//        $arr = $this->DetailTFeature->find('all', array(
//            'conditions' => array('circumstance_id' => $circumstance),
//            'recursive' => 2
//        ));
        $arr=  $this->detailTFeatures;
        $arr_detail = array();
        for ($i = 0; $i < count($arr); $i++) {
            array_push($arr_detail, $arr[$i]['DetailTFeature']);
        }
        return $arr_detail;
    }
    //get num detailFeature of circumstancs
    public function getNumberDetailFeature($cir_id){
        $arr_detail = $this->getDetailTFeatures($cir_id);
        $count_feature = count($this->getFeatures($cir_id)); //num feature of the circumstance
        $count_detailtfeature = count($arr_detail) / $count_feature; //number detail t feature
        return $count_detailtfeature;
    }

    // get data (input for algorithm) container array tfeatures
    public function getDataID3($circumstance_id) {
        $arr_detail = $this->getDetailTFeatures($circumstance_id);
        $arr_data = array();
        $count_feature = count($this->getFeatures($circumstance_id)); //num feature of the circumstance
        //echo 'met vai'.count($this->getFeatures($circumstance_id));
        $count_detailtfeature = count($arr_detail) / $count_feature; //number detail t feature
        $tmp = 0;
        for ($i = 0; $i < $count_detailtfeature; $i++) {
            for ($j = $tmp; $j < $tmp + $count_feature; $j++) {
                $arr_data[$i][$j - $tmp] = $this->getNameTFeature($arr_detail[$j]['t_feature_id']);
                $arr_data[$i][$count_feature] = $arr_detail[$j]['classification'];
            }
            $tmp = $tmp + $count_feature;
        }
        return $arr_data;
    }
    public function getLog2($x) {
        return log($x) / log(2);
    }
    //get num yes in data_id3 
    public function getNumberYes_S($circumstance_id) {
        $count_feature = count($this->getFeatures($circumstance_id));
        $count = 0;
        $arr = $this->getDataID3($circumstance_id);
        $num_tfeature=$count_feature; //$count_feature=4
        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i][$num_tfeature] == 1) {
                $count++;
            }
        }
        return $count;
    }
    ///get num no in data_id3 
    public function getNumberNo_S($circumstance_id) {
        return (count($this->getDataID3($circumstance_id))) - ($this->getNumberYes_S($circumstance_id));
    }
    public function getNumberYes_tfeature($tfeature_name,$cir_id){
        $count=0;
        $fea_id=  $this->getFeatureID($tfeature_name);
        $arr_tfea=  $this->getTFeatures($fea_id);
        //$arr_tfea=$this->tfeatures;
        $count_feature = count($this->getFeatures($cir_id));
        $data_id3=  $this->getDataID3($cir_id);
        for($i=0;$i<count($arr_tfea);$i++){
            for($j=0;$j<count($data_id3);$j++){
                for($k=0;$k<count($data_id3[0]);$k++){
                    if($arr_tfea[$i]['TFeature']['f_name']==$data_id3[$j][$k]&$data_id3[$j][$k]==$tfeature_name){
                        //echo 'yes/no'.$data_id3[$j][4];
                        if($data_id3[$j][$count_feature]==1)//$count_feature=4
                            $count++;
                    }
                }
                
            }
        }
        return $count;
    }
    
    public function getNumberNo_tfeature($tfeature_name,$cir_id){
        $count=0;
        $fea_id=  $this->getFeatureID($tfeature_name);
        $arr_tfea=  $this->getTFeatures($fea_id);
        //$arr_tfea=$this->tfeatures;
        $count_feature = count($this->getFeatures($cir_id));
        $data_id3=  $this->getDataID3($cir_id);
        for($i=0;$i<count($arr_tfea);$i++){
            for($j=0;$j<count($data_id3);$j++){
                for($k=0;$k<count($data_id3[0]);$k++){
                    if($arr_tfea[$i]['TFeature']['f_name']==$data_id3[$j][$k]&$data_id3[$j][$k]==$tfeature_name){
                        //echo 'yes/no'.$data_id3[$j][4];
                        if($data_id3[$j][$count_feature]==0) //$count_feature=4
                            $count++;
                    }
                }
                
            }
        }
        return $count;
    }
    //9yes 5no Entropy(S) = - (9/14) Log2 (9/14) - (5/14) Log2 (5/14) = 0.940
    public function Entropy($y, $n) {
        if($y==0||$n==0)
            return 0;
        $sum = $y + $n;
        return -($y / $sum) * $this->getLog2($y / $sum) - ($n / $sum) * $this->getLog2($n / $sum);
    }
    
    //Gain(S,Wind)=Entropy(S)-(8/14)*Entropy(Sweak)-(6/14)*Entropy(Sstrong)
    //get value Gain of the feature
    public function Gain_Feature($cir_id,$feature_id) {
        $gain = 0.0;
        $numTFeature = count($this->getTFeatures($feature_id)); //number TFeature of the feature
        $entropy_S=  $this->Entropy($this->getNumberYes_S($cir_id),  $this->getNumberNo_S($cir_id));
        $gain=$entropy_S;
        $arr_tfea=  $this->getTFeatures($feature_id);
            for($j=0;$j<count($arr_tfea);$j++){
                if($arr_tfea[$j]['TFeature']['feature_id']==$feature_id){
                    $numYes=$this->getNumberYes_tfeature($arr_tfea[$j]['TFeature']['f_name'], $cir_id);
                    $numNo=$this->getNumberNo_tfeature($arr_tfea[$j]['TFeature']['f_name'], $cir_id);
                    $sum=$numYes+$numNo;
                    $gain=$gain-($sum/$this->getNumberDetailFeature($cir_id))*$this->Entropy($numYes,$numNo);
                }
            }
        return $gain;
        
    }
    public function  getYes_Tfeature($tfea_name,$tfea_name2,$cir_id){
        $count=0;
        $fea_id=  $this->getFeatureID($tfea_name);
        $arr_tfea=  $this->getTFeatures($fea_id);
        //$arr_tfea=$this->tfeatures;
        $count_feature = count($this->getFeatures($cir_id));
        $data_id3=  $this->getDataID3($cir_id);
            for($j=0;$j<count($data_id3);$j++){
                for($k=0;$k<count($data_id3[0]);$k++){
                   if($data_id3[$j][$k]==$tfea_name){
                       for($l=0;$l<$count_feature;$l++){
                            if($data_id3[$j][$l]==$tfea_name2&$data_id3[$j][$count_feature]==1)
                            {
                                $count++;
                            }
                    }
                   }
                }
                
            }
       // }
        return $count;
    }

    public function  getNo_Tfeature($tfea_name,$tfea_name2,$cir_id){
        $count=0;
        $count_feature = count($this->getFeatures($cir_id));
        $fea_id=  $this->getFeatureID($tfea_name);
        $arr_tfea=  $this->getTFeatures($fea_id);
        //$arr_tfea=$this->tfeatures;
        $data_id3=  $this->getDataID3($cir_id);
        //for($i=0;$i<count($arr_tfea);$i++){
            for($j=0;$j<count($data_id3);$j++){
                for($k=0;$k<count($data_id3[0]);$k++){
                   if($data_id3[$j][$k]==$tfea_name){
                       for($l=0;$l<$count_feature;$l++){
                            if($data_id3[$j][$l]==$tfea_name2&$data_id3[$j][$count_feature]==0)
                            {
                                $count++;
                            }
                        
                    }
                   }
                }
                
            }
       // }
        return $count;
    }
    
    public function Gain_TFeature($tfea_name,$fea_id,$cir_id){
        $gain = 0.0;
        $numYes_tfea=$this->getNumberYes_tfeature($tfea_name, $cir_id);
        $numNo_tfea=$this->getNumberNo_tfeature($tfea_name, $cir_id);
        $sum_tfea=$numNo_tfea+$numYes_tfea;
        $numTFeature = count($this->getTFeatures($fea_id)); //number TFeature of the feature
        $entropy_S=  $this->Entropy($numYes_tfea,$numNo_tfea);
        $gain=$entropy_S;
        $arr_tfea=  $this->getTFeatures($fea_id);
            for($j=0;$j<count($arr_tfea);$j++){
                if($arr_tfea[$j]['TFeature']['feature_id']==$fea_id){
                    $numYes=$this->getYes_Tfeature($tfea_name,$arr_tfea[$j]['TFeature']['f_name'], $cir_id);
                    $numNo=$this->getNo_Tfeature($tfea_name,$arr_tfea[$j]['TFeature']['f_name'], $cir_id);
                    $sum=$numYes+$numNo;
                    $gain=$gain-($sum/$sum_tfea)*$this->Entropy($numYes,$numNo);
                }
            }
        return $gain;
    }
    
    public function getBestGain_Feature($cir_id){
        $arr_fea=  $this->getFeatures($cir_id);
        $max=0;
        $gain=0;
        $fea_name='';
        for($i=0;$i<count($arr_fea);$i++){
            $gain=$this->Gain_Feature($cir_id,$arr_fea[$i]['Feature']['id']);
            if($gain>$max){
                $max=$gain;
                $fea_name=$arr_fea[$i]['Feature']['f_name'];
            }
            //echo 'fea:'.$arr_fea[$i]['Feature']['id'];
        }
        if($fea_name==NULL)
            return NULL;
        else
            return $fea_name;
    }
    
    //out put feature id from name_feature
    public function getFeatureID($tfea_name){
        $arr_tfea=  $this->tfeatures;
        $fea_id;
        for($i=0;$i<count($arr_tfea);$i++){
            if($arr_tfea[$i]['TFeature']['f_name']==$tfea_name){
                $fea_id=$arr_tfea[$i]['TFeature']['feature_id'];
            }
        }
        return $fea_id;
    }
    
    public function getBestGain_TFeature($cir_id,$tfea_name){ //fea_id of tfea_name for ....
        //$arr_tfea=  $this->getTFeatures($fea_id);
        $max=0;
        $gain;
        $fea_name='';
        $fea_id_exclusion=  $this->getFeatureID('Sunny');
        $arr_fea=  $this->getFeatures($cir_id);
        for($i=0;$i<count($arr_fea);$i++){
            if($arr_fea[$i]['Feature']['id']!=$fea_id_exclusion){
                $gain=  $this->Gain_TFeature($tfea_name,$arr_fea[$i]['Feature']['id'],$cir_id);
                if($gain>$max){
                    $max=$gain;
                    $fea_name=$arr_fea[$i]['Feature']['f_name'];
                }
            }
                
        }
        if($fea_name==NULL)
            return 'NULL';
        else
            return $fea_name;
    }
    
    // check tfea_name yes all or no all
     public function checkYesAll($tfea_name,$cir_id){
        if($this->getNumberNo_tfeature($tfea_name,$cir_id)==0)
            return 1;
        else
            return 0;
    }
    
     public function checkNoAll($tfea_name,$cir_id){
        if($this->getNumberYes_tfeature($tfea_name,$cir_id)==0)
            return 1;
        else
            return 0;
    }
    public function getNameFeature($fea_id){
        $arr=$this->features;
        for($i=0;$i<count($arr);$i++){
            if($arr[$i]['Feature']['id']==$fea_id){
                return $arr[$i]['Feature']['f_name'];
            }
        }
        return NULL;
    }

    public function checkCircumstance($cir_id,$arr_test){
        $decision_tree=  $this->algorithmsID3($cir_id);
        for($i=0;$i<count($decision_tree);$i++){
            if($decision_tree[$i][1][0]=='Yes'){
                //echo $decision_tree[$i][0];
                for($j=0;$j<count($arr_test);$j++){
                   
                   if($decision_tree[$i][0]==$arr_test[$j]){
                       //echo $decision_tree[$i][0].'j:'.$i;
                       $fea_id=  $this->getFeatureID($arr_test[$j]); //id node root
                       if($this->getNameFeature($fea_id)==$decision_tree[0][0])
                            return 1;
                       else{
                           //echo $decision_tree[$i][0];
                           $fea_id=$this->getFeatureID($decision_tree[$i][0]);
                           $fea_name=$this->getNameFeature($fea_id);
                           //echo $fea_name.'i: '.$i.'$j:'.$j;
                           for($l=0;$l<count($decision_tree);$l++){
                                if($decision_tree[$l][1][0]==$fea_name){
                                //echo $decision_tree[$l][0];
                                for($k=0;$k<count($arr_test);$k++){
                                    if($decision_tree[$l][0]==$arr_test[$k]){
                                        //echo $arr_test[$k];
                                        return 1;
                                    }
                                }
                                
                           }
                       }
                       
                   }
                }
            }
            }
        }
        return 0;
    }
    
    //public $tree=new TreeNode();
    // input is circumstance id
    // output is tree node (label node,children node)
    public function algorithmsID3($cir_id){
        $arr_tree=array();
        $arr_store_BestGain_TFeature=array();
        $arr_fea=  $this->getFeatures($cir_id);

            $decisionTree=array($this->getBestGain_Feature($cir_id));
            $name_root=$this->getBestGain_Feature($cir_id);
            $arr_tfea=  $this->getTFeatures($this->getIDFeature($name_root));
            $arr_child=array();
            for($k=0;$k<count($arr_tfea);$k++){
                array_push($arr_child,$arr_tfea[$k]['TFeature']['f_name']);
            }
            $tree=new TreeNode($name_root,$arr_child);
            //$arr_tree=array();
            array_push($arr_tree, $tree->addNode());
            for($i=0;$i<count($arr_tfea);$i++){
                if($this->checkYesAll($arr_tfea[$i]['TFeature']['f_name'], $cir_id)==1){
                    //echo $arr_tfea[$i]['TFeature']['f_name'];
                    $arr_child=array('Yes');
                    $tree=new TreeNode($arr_tfea[$i]['TFeature']['f_name'], $arr_child);
                    array_push($arr_tree, $tree->addNode());
                }
                if($this->checkNoAll($arr_tfea[$i]['TFeature']['f_name'], $cir_id)==1){
                    $arr_child=array('No');
                    $tree=new TreeNode($arr_tfea[$i]['TFeature']['f_name'], $arr_child);
                    array_push($arr_tree, $tree->addNode());
                }
                if($this->getBestGain_TFeature($cir_id,$arr_tfea[$i]['TFeature']['f_name'])!='NULL'){
                    
                    array_push($arr_store_BestGain_TFeature,$this->getBestGain_TFeature($cir_id,$arr_tfea[$i]['TFeature']['f_name']));
                    $arr_child=array($this->getBestGain_TFeature($cir_id,$arr_tfea[$i]['TFeature']['f_name']));
                    $tree=new TreeNode($arr_tfea[$i]['TFeature']['f_name'], $arr_child);
                    array_push($arr_tree, $tree->addNode());
                }
                
            }
            //array_push($arr_tree, '$tree->addNode()');
            for($l=0;$l<count($arr_store_BestGain_TFeature);$l++){
                //echo $arr_store_BestGain_TFeature[$l];
                $ar_tfea=  $this->getTFeatures($this->getIDFeature($arr_store_BestGain_TFeature[$l]));
                for($m=0;$m<count($ar_tfea);$m++){
                    $arr_child=array($this->getMostCommonValue($ar_tfea[$m]['TFeature']['f_name'],$cir_id));
                    $tree=new TreeNode($ar_tfea[$m]['TFeature']['f_name'], $arr_child);
                    array_push($arr_tree, $tree->addNode());
                    
                }
             }
        return $arr_tree;
    }
    public function getIDFeature($fea_name){
        $arr_fea=  $this->features;
        for($i=0;$i<count($arr_fea);$i++){
            if($arr_fea[$i]['Feature']['f_name']==$fea_name){
                return $arr_fea[$i]['Feature']['id'];
            }
        }
    }
    //equal num yes/no. if num yes>num no node tfeature is Yes.
    public function getMostCommonValue($tfea_name,$cir_id){
        $label='';
        $num_yes=  $this->getNumberYes_tfeature($tfea_name, $cir_id);
        $num_no=  $this->getNumberNo_tfeature($tfea_name, $cir_id);
        if($num_yes>$num_no)
            $label='Yes';
        else
            $label='No';
        return $label;
                
    }
    
    public function RunID3(){
        
        $this->init();
        
        //$arr_fea=  $this->getFeatures(3);
        
//        $arr_tfea= $this->getTFeatures($feature)
//        var_dump($this->decisionTree(3));
//                die();
//      
        
        $arr_test=array('Rain','Cool','Normal','Weak');
        
        return $this->checkCircumstance(3,$arr_test); //15 is fea id begin
    }
    //build decision tree from data of function algorithmsID3()
    //input : array algorithmsID3()
    //output: decision tree
//    public function decisionTree($treeNode_id3){
//        $decisionTree=array();
//        //echo count($treeNode_id3[0]);
//        array_push($decisionTree,$treeNode_id3[0]);
//        //echo count($decisionTree[0][1]);
//        for($i=0;$i<count($decisionTree[0][1]);$i++){
//            //echo $decisionTree[0][1][$i];
//            for($j=0;$j<count($treeNode_id3);$j++){
//                
//                if($treeNode_id3[$j][0]==$decisionTree[0][1][$i]){
//                    if($treeNode_id3[$j][1][0]=='Yes'||$treeNode_id3[$j][1][0]=='No'){
//                        $ar=array($decisionTree[0][1][$i]=>array($treeNode_id3[$j][1][0]));
//                        $decisionTree[0][1][$i]=$ar;
//                    }else{
//                        for($k=0;$k<count($this->getTFeatures($this->getIDFeature($treeNode_id3[$j][1][0])));$k++){
//                            echo $treeNode_id3[$j][1][0];
//                            for($l=0;$l<count($treeNode_id3);$l++){
//                                //echo $treeNode_id3[$l][0];
//                            }
//                        }
//                    }
//                    
//                   // $treeNode_id3[0][1][$j]=$
//                }
//            }
//                
//        }
//        return $treeNode_id3;
//    }

    
    
}