<?php
App::uses('AppModel', 'Model');

/**
 * City Model
 *
 */
class City extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'city';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'city_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'city_name' => array(
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
            'District'=>array(
                'className'=>'District',
                'foreignKey'=>'city_id'
            ),
            'Friend'=>array(
                'className'=>'Friend',
                'foreignKey'=>'user_id'
            ),
            'Status'=>array(
                'className'=>'Status',
                'foreignKey'=>'user_id'
            )
        );
        public function insertCity(){
            $this->save(array(
                'city_name'=>'Quang Nam'
            ));
        }
}
