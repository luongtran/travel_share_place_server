<?php
App::uses('EventActivity', 'Model');

/**
 * EventActivity Test Case
 *
 */
class EventActivityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.event_activity'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EventActivity = ClassRegistry::init('EventActivity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EventActivity);

		parent::tearDown();
	}

}
