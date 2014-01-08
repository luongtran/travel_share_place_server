<?php
App::uses('TFeature', 'Model');

/**
 * TFeature Test Case
 *
 */
class TFeatureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.t_feature'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TFeature = ClassRegistry::init('TFeature');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TFeature);

		parent::tearDown();
	}

}
