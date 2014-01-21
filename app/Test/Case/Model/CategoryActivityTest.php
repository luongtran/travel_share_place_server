<?php
App::uses('CategoryActivity', 'Model');

/**
 * CategoryActivity Test Case
 *
 */
class CategoryActivityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.category_activity'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoryActivity = ClassRegistry::init('CategoryActivity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoryActivity);

		parent::tearDown();
	}

}
