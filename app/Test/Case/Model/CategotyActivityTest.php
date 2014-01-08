<?php
App::uses('CategotyActivity', 'Model');

/**
 * CategotyActivity Test Case
 *
 */
class CategotyActivityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categoty_activity'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategotyActivity = ClassRegistry::init('CategotyActivity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategotyActivity);

		parent::tearDown();
	}

}
