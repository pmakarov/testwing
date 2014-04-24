<?php
App::uses('CommentsTag', 'Model');

/**
 * CommentsTag Test Case
 *
 */
class CommentsTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comments_tag',
		'app.comment',
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
		'app.transaction_rejection',
		'app.transaction_rejection_type',
		'app.comment_type',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CommentsTag = ClassRegistry::init('CommentsTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CommentsTag);

		parent::tearDown();
	}

}
