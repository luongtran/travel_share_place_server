<?php
App::uses('AppModel', 'Model');
/**
 * Activity Model
 *
 */
class Activity extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'activity';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        
        public $belongsTo=array(
            'event'=>array(
                'className'=>'EventActivity',
                'foreignKey'=>'event_id'
            ),
            'category'=>array(
                'classname'=>'CategoryActivity',
                'foreignKey'=>'category_id'
            ),
            'user'=>array(
                'className'=>'User',
                'foreignKey'=>'user_id'
            )
            //....n
        );
       
}
