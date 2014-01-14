<?php
/**
 * LikePlaceFixture
 *
 */
class LikePlaceFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'like_place';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'place_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'like_time' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
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
			'like_time' => 1389601165
		),
	);

}
