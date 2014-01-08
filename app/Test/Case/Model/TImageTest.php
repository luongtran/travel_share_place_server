<?php
App::uses('TImage', 'Model');

/**
 * TImage Test Case
 *
 */
class TImageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.t_image'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TImage = ClassRegistry::init('TImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TImage);

		parent::tearDown();
	}

}
