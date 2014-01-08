<?php
/**
 * PlaceFixture
 *
 */
class PlaceFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'place';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'address' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'place_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'p_like' => array('type' => 'integer', 'null' => true, 'default' => null),
		'p_view' => array('type' => 'integer', 'null' => true, 'default' => null),
		'p_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'longitude' => array('type' => 'float', 'null' => true, 'default' => null),
		'latitude' => array('type' => 'float', 'null' => true, 'default' => null),
		'district_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'rate' => array('type' => 'integer', 'null' => true, 'default' => null),
		'website' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'mobile' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 12, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'tplace_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'tbl_place_ibfk_1' => array('column' => 'district_id', 'unique' => 0),
			'tbl_place_ibfk_2' => array('column' => 'tplace_id', 'unique' => 0)
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
			'address' => 'Lorem ipsum dolor sit amet',
			'place_name' => 'Lorem ipsum dolor sit amet',
			'p_like' => 1,
			'p_view' => 1,
			'p_time' => '2013-12-18 08:01:15',
			'longitude' => 1,
			'latitude' => 1,
			'district_id' => 1,
			'rate' => 1,
			'website' => 'Lorem ipsum dolor sit amet',
			'mobile' => 'Lorem ipsu',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'tplace_id' => 1
		),
	);

}
