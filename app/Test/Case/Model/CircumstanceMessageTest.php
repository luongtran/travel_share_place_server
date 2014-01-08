<?php
App::uses('CircumstanceMessage', 'Model');

/**
 * CircumstanceMessage Test Case
 *
 */
class CircumstanceMessageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.circumstance_message'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CircumstanceMessage = ClassRegistry::init('CircumstanceMessage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CircumstanceMessage);

		parent::tearDown();
	}

}
