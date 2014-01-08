<?php
App::uses('StatusComment', 'Model');

/**
 * StatusComment Test Case
 *
 */
class StatusCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status_comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StatusComment = ClassRegistry::init('StatusComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StatusComment);

		parent::tearDown();
	}

}
