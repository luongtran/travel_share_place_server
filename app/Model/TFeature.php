<?php

App::uses('AppModel', 'Model');

/**
 * TFeature Model
 *
 */
class TFeature extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 't_feature';

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
        'DetailTFeature' => array(
            'className' => 'DetailTFeature',
            'foreignKey' => 't_feature_id'
        )
    );
    public $belongsTo = array(
        'Feature' => array(
            'className' => 'TFeature',
            'foreignKey' => 'feature_id'
        )
    );
    public function getAllTFeature() {
        $arr = $this->find('all', array(
            'recursive' => -1
        ));
        return $arr;
    }
}
