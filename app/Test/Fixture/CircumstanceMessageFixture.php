<?php
/**
 * CircumstanceMessageFixture
 *
 */
class CircumstanceMessageFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'circumstance_message';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'circumstance_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'primary'),
		'message_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('circumstance_id', 'message_id'), 'unique' => 1),
			'message_id' => array('column' => 'message_id', 'unique' => 0)
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
			'circumstance_id' => 1,
			'message_id' => 1
		),
	);

}
