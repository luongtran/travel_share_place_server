<?php
App::uses('AppModel', 'Model');
/**
 * CircumstanceMessage Model
 *
 */
class CircumstanceMessage extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'circumstance_message';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'circumstance_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'circumstance_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'message_id' => array(
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
}
