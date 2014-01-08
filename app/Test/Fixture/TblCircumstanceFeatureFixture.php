<?php
/**
 * TblCircumstanceFeatureFixture
 *
 */
class TblCircumstanceFeatureFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'tbl_circumstance_feature';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'feature_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'primary'),
		'circumstance_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('feature_id', 'circumstance_id'), 'unique' => 1),
			'circumstance_id' => array('column' => 'circumstance_id', 'unique' => 0)
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
			'feature_id' => 1,
			'circumstance_id' => 1
		),
	);

}
