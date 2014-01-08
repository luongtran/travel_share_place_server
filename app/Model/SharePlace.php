<?php
App::uses('AppModel', 'Model');
/**
 * SharePlace Model
 *
 */
class SharePlace extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'share_place';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        //relatioship
        public $belongsTo=array(
            'user'=>array(
                'className'=>'User',
                'foreignKey'=>'User_id'
            ),
            'place'=>array(
                'className'=>'Place',
                'foreignKey'=>'place_id'
            ),
        );
        
}
