<?php

App::uses('AppModel', 'Model');
/**
 * District Model
 *
 */
class District extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'district';

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
		'district_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'city_id' => array(
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
        public $belongsTo=array(
            'city'=>array(
                'className'=>'City',
                'foreignKey'=>'city_id'
            )
        );
        public $hasMany =array(
            'Place'=>array(
                'className'=>'Place',
                'foreignKey'=>'district_id'
            )
        ); 
        public function districtOfCity($city_id){
            $arr_district=array();
            $arr=$this->find('all',array(
                'recursive'=>-1,
                'conditions'=>array('city_id'=>$city_id['city_id'])
            ));
            for($i=0;$i<count($arr);$i++){
                array_push($arr_district,$arr[$i]['District']);
            }        
            return $arr_district;
        }
}
