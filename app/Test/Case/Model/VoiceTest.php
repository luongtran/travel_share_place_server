<?php
App::uses('Voice', 'Model');

/**
 * Voice Test Case
 *
 */
class VoiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.voice'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Voice = ClassRegistry::init('Voice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Voice);

		parent::tearDown();
	}

}
