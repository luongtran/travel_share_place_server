<?php
App::uses('CircumstanceFeature', 'Model');

/**
 * CircumstanceFeature Test Case
 *
 */
class CircumstanceFeatureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.circumstance_feature'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CircumstanceFeature = ClassRegistry::init('CircumstanceFeature');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CircumstanceFeature);

		parent::tearDown();
	}

}
