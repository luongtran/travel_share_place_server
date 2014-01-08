<?php
App::uses('AppModel', 'Model');
/**
 * Follow Model
 *
 */

class Follow extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
    
	public $useTable = 'follow';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        public $belongsTo=array(
            'Place'=>array(
                'className'=>'Place',
                'foreignKey'=>'place_id'
            )
        );
}
