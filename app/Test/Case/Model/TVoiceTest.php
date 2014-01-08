<?php
App::uses('TVoice', 'Model');

/**
 * TVoice Test Case
 *
 */
class TVoiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.t_voice'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TVoice = ClassRegistry::init('TVoice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TVoice);

		parent::tearDown();
	}

}
