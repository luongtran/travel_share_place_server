<?php
App::uses('AppModel', 'Model');
/**
 * Friend Model
 *
 */
class Friend extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'friend';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        public $belongsTo=array(
            'User'=>array(
                'className'=>'User',
                'foreignKey'=>'user_id'
            )
        );
        public $hasMany =array(
            'User'=>array(
                'className'=>'User',
                'foreignKey'=>'id'
            ),
        );
}
