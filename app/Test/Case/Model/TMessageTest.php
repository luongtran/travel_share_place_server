<?php
App::uses('TMessage', 'Model');

/**
 * TMessage Test Case
 *
 */
class TMessageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.t_message'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TMessage = ClassRegistry::init('TMessage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TMessage);

		parent::tearDown();
	}

}
