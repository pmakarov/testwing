<?php
App::uses('EdiType', 'Model');

/**
 * EdiType Test Case
 *
 */
class EdiTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.edi_type',
		'app.upload',
		'app.user',
		'app.group',
		'app.post',
		'app.uploads_user',
		'app.customer',
		'app.uploads_customer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EdiType = ClassRegistry::init('EdiType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EdiType);

		parent::tearDown();
	}

}
