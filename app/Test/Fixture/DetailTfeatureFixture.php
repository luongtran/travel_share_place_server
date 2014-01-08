<?php
/**
 * DetailTfeatureFixture
 *
 */
class DetailTfeatureFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'detail_tfeature';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		't_feature_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'circumstance_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'classification' => array('type' => 'integer', 'null' => true, 'default' => null),
		'count_' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'circumstance_id' => array('column' => 'circumstance_id', 'unique' => 0),
			't_feature_id' => array('column' => 't_feature_id', 'unique' => 0)
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
			't_feature_id' => 1,
			'circumstance_id' => 1,
			'classification' => 1,
			'count_' => 1
		),
	);

}
