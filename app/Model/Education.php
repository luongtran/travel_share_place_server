<?php
App::uses('AppModel', 'Model');
/**
 * Education Model
 *
 */
class Education extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'education';

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
		'education_name' => array(
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
                'foreignKey'=>'education_id'
            )
        );
}
