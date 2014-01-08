<?php
App::uses('AppModel', 'Model');
/**
 * CircumstanceFeature Model
 *
 */
class CircumstanceFeature extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'circumstance_feature';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'feature_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'feature_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'feature_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'circumstance_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            
        );
        public $belongsTo=array(
            'Circumstance'=>array(
                'className'=>'Circumstance',
                'foreignKey'=>'circumstance_id'
            ),
            'Feature'=>array(
                'className'=>'Feature',
                'foreignKey'=>'feature_id'
            ),
	);
        
        public function getAllCircumstanceFeature(){
         $arr = $this->find('all');
         return $arr;
        }
        
}
