<?php
App::uses('AppModel', 'Model');
/**
 * Decentralization Model
 *
 */
class Decentralization extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'decentralization';

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
		'decentralization_name' => array(
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
        public $hasMany =array(
            'User'=>array(
                'className'=>'User',
                'foreignKey'=>'decentralization_id'
            )
        );
        
}
