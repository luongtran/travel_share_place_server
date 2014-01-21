<?php
/**
 * ViewFixture
 *
 */
class ViewFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'view';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'place_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'view_time' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'view_count' => array('type' => 'integer', 'null' => true, 'default' => '0'),
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
			'place_id' => 1,
			'view_time' => 1390194747,
			'view_count' => 1
		),
	);

}
