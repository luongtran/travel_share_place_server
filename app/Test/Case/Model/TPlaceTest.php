<?php
App::uses('TPlace', 'Model');

/**
 * TPlace Test Case
 *
 */
class TPlaceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.t_place'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TPlace = ClassRegistry::init('TPlace');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TPlace);

		parent::tearDown();
	}

}
