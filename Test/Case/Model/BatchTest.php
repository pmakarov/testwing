<?php
App::uses('Batch', 'Model');

/**
 * Batch Test Case
 *
 */
class BatchTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.batch'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Batch = ClassRegistry::init('Batch');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Batch);

		parent::tearDown();
	}

}
