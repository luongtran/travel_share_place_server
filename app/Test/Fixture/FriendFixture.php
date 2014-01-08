<?php
/**
 * FriendFixture
 *
 */
class FriendFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'friend';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'friend_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'friend_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'u_id' => array('column' => 'user_id', 'unique' => 0),
			'friend_id' => array('column' => 'friend_id', 'unique' => 0)
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
			'friend_time' => '2013-12-18 07:58:16',
			'friend_id' => 1
		),
	);

}
