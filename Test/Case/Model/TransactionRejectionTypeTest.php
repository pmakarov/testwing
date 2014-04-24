<?php
App::uses('TransactionRejectionType', 'Model');

/**
 * TransactionRejectionType Test Case
 *
 */
class TransactionRejectionTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transaction_rejection_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransactionRejectionType = ClassRegistry::init('TransactionRejectionType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransactionRejectionType);

		parent::tearDown();
	}

}
