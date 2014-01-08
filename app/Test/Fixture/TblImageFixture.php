<?php
/**
 * TblImageFixture
 *
 */
class TblImageFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'tbl_image';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'typeimage_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'place_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'src' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'tbl_image_ibfk_1' => array('column' => 'typeimage_id', 'unique' => 0),
			'tbl_image_ibfk_2' => array('column' => 'user_id', 'unique' => 0),
			'tbl_image_ibfk_3' => array('column' => 'place_id', 'unique' => 0)
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
			'typeimage_id' => 1,
			'user_id' => 1,
			'place_id' => 1,
			'src' => 'Lorem ipsum dolor sit amet'
		),
	);

}
