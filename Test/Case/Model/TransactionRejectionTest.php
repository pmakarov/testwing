<?php
App::uses('TransactionRejection', 'Model');

/**
 * TransactionRejection Test Case
 *
 */
class TransactionRejectionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transaction_rejection',
		'app.transaction',
		'app.upload',
		'app.user',
		'app.group',
		'app.post',
		'app.uploads_user',
		'app.customer',
		'app.uploads_customer',
		'app.edi_type',
		'app.transaction_status',
		'app.comment',
		'app.transaction_rejection_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransactionRejection = ClassRegistry::init('TransactionRejection');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransactionRejection);

		parent::tearDown();
	}

}
