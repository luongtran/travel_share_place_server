<?php
App::uses('Decentralization', 'Model');

/**
 * Decentralization Test Case
 *
 */
class DecentralizationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.decentralization'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Decentralization = ClassRegistry::init('Decentralization');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Decentralization);

		parent::tearDown();
	}

}
