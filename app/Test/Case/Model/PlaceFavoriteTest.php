<?php
App::uses('PlaceFavorite', 'Model');

/**
 * PlaceFavorite Test Case
 *
 */
class PlaceFavoriteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.place_favorite'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlaceFavorite = ClassRegistry::init('PlaceFavorite');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlaceFavorite);

		parent::tearDown();
	}

}
