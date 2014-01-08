<?php

App::uses('AppModel', 'Model');

/**
 * Feature Model
 *
 */
class Feature extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'feature';
    
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
        'f_name' => array(
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
    public $hasMany = array(
        'TFeature' => array(
            'className' => 'TFeature',
            'foreignKey' => 'feature_id'
        ),
        'CircumstanceFeature' => array(
            'className' => 'CircumstanceFeature',
            'foreignKey' => 'feature_id'
        ),
        
        
    );
    //get array feature
    public function getAllFeature(){
        $arr = $this->find('all',array(
            'recursive'=>-1
        ));
        return $arr;
    }

}
