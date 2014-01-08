<?php
App::uses('Relationship', 'Model');

/**
 * Relationship Test Case
 *
 */
class RelationshipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.relationship'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Relationship = ClassRegistry::init('Relationship');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Relationship);

		parent::tearDown();
	}

}
