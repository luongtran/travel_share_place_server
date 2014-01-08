<?php
App::uses('Circumstance', 'Model');

/**
 * Circumstance Test Case
 *
 */
class CircumstanceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.circumstance'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Circumstance = ClassRegistry::init('Circumstance');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Circumstance);

		parent::tearDown();
	}

}
