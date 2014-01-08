<?php
App::uses('PlaceComment', 'Model');

/**
 * PlaceComment Test Case
 *
 */
class PlaceCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.place_comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlaceComment = ClassRegistry::init('PlaceComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlaceComment);

		parent::tearDown();
	}

}
