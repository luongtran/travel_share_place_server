<?php

App::uses('AppModel', 'Model');

/**
 * DetailTfeature Model
 *
 */
class DetailTfeature extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'detail_tfeature';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'id';
    public $belongsTo = array(
        'Circumstance' => array(
            'className' => 'Circumstance',
            'foreignKey' => 'circumstance_id'
        ),
        'TFeature' => array(
            'className' => 'TFeature',
            'foreignKey' => 't_feature_id'
        ),
//        'Feature'  => array(
//            'className' => 'Feature'
//        ),
    );
    //get array TFeature of the circumstance
    public function getAllDetailTFeatures(){
        $arr = $this->find('all', array(
            'recursive' => 2
        ));
        return $arr;
    }

}
