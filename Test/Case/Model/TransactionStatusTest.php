<?php
App::uses('TransactionStatus', 'Model');

/**
 * TransactionStatus Test Case
 *
 */
class TransactionStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transaction_status',
		'app.transaction',
		'app.upload',
		'app.user',
		'app.group',
		'app.post',
		'app.uploads_user',
		'app.customer',
		'app.uploads_customer',
		'app.edi_type',
		'app.comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TransactionStatus = ClassRegistry::init('TransactionStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TransactionStatus);

		parent::tearDown();
	}

}
