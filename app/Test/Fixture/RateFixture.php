<?php
/**
 * RateFixture
 *
 */
class RateFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'rate';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'num_rate' => array('type' => 'float', 'null' => true, 'default' => null),
		'place_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'user_id' => 1,
			'num_rate' => 1,
			'place_id' => 1
		),
	);

}
