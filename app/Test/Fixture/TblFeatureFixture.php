<?php
/**
 * TblFeatureFixture
 *
 */
class TblFeatureFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'tbl_feature';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'type_feature_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'f_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'type_feature_id' => array('column' => 'type_feature_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'type_feature_id' => 1,
			'f_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
