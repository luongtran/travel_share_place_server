<?php
/**
 * SharePlaceFixture
 *
 */
class SharePlaceFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'share_place';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'place_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'share_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'share_time' => '2013-12-30 04:24:37'
		),
	);

}
