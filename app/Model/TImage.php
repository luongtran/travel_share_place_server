<?php
App::uses('AppModel', 'Model');
/**
 * TImage Model
 *
 */
class TImage extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 't_image';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
        public $hasMany =array(
            'Image'=>array(
                'className'=>'Image',
                'foreignKey'=>'typeimage_id'
            )
        );
}
