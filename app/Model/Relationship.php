<?php
App::uses('AppModel', 'Model');
/**
 * Relationship Model
 *
 */
class Relationship extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'relationship';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        public $hasMany =array(
            'User'=>array(
                'className'=>'User',
                'foreignKey'=>'relationship_id'
            )
        );
}
