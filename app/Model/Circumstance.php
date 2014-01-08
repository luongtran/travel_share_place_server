<?php
App::uses('AppModel', 'Model');
/**
 * Circumstance Model
 *
 */
class Circumstance extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'circumstance';

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
		'content' => array(
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
            'DetailTFeature'=>array(
                'className'=>'DetailTFeature',
                'foreignKey'=>'circumstance_id'
            ),
            'Circumstance_Feature'=>array(
                'className'=>'CircumstanceFeature',
                'foreignKey'=>'circumstance_id'
            )
        );
        public $circumstances;
        //get a circumstances from circumstance_id 
        
        public function getAllCircumstance() {
            $arr_allcircumstance = $this->find('all', array(
                'recursive' => -1
            ));
            return $arr_allcircumstance;
        }
        
        
}
