<?php
App::uses('AppModel', 'Model');
/**
 * TPlace Model
 *
 */
class TPlace extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 't_place';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        public $hasMany =array(
            'Place'=>array(
                'className'=>'Place',
                'foreignKey'=>'tplace_id'
            )
        );  
}
