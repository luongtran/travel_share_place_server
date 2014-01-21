<?php
App::uses('ViewPlace', 'Model');

/**
 * ViewPlace Test Case
 *
 */
class ViewPlaceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.view_place'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ViewPlace = ClassRegistry::init('ViewPlace');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ViewPlace);

		parent::tearDown();
	}

}
