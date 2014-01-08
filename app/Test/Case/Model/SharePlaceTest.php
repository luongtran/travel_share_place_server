<?php
App::uses('SharePlace', 'Model');

/**
 * SharePlace Test Case
 *
 */
class SharePlaceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.share_place'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SharePlace = ClassRegistry::init('SharePlace');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SharePlace);

		parent::tearDown();
	}

}
