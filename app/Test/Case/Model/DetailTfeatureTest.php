<?php
App::uses('DetailTfeature', 'Model');

/**
 * DetailTfeature Test Case
 *
 */
class DetailTfeatureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.detail_tfeature'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DetailTfeature = ClassRegistry::init('DetailTfeature');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DetailTfeature);

		parent::tearDown();
	}

}
