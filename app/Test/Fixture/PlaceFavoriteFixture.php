<?php
/**
 * PlaceFavoriteFixture
 *
 */
class PlaceFavoriteFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'place_favorite';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'primary'),
		'place_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'key' => 'primary'),
		'place_fav_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('user_id', 'place_id'), 'unique' => 1),
			'place_id' => array('column' => 'place_id', 'unique' => 0)
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
			'user_id' => 1,
			'place_id' => 1,
			'place_fav_time' => '2013-12-18 08:02:02'
		),
	);

}
