<?php
App::uses('LikePlace', 'Model');

/**
 * LikePlace Test Case
 *
 */
class LikePlaceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.like_place'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LikePlace = ClassRegistry::init('LikePlace');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LikePlace);

		parent::tearDown();
	}

}
