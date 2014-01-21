<?php
App::uses('LikeStatus', 'Model');

/**
 * LikeStatus Test Case
 *
 */
class LikeStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.like_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LikeStatus = ClassRegistry::init('LikeStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LikeStatus);

		parent::tearDown();
	}

}
