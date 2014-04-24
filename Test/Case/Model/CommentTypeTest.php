<?php
App::uses('CommentType', 'Model');

/**
 * CommentType Test Case
 *
 */
class CommentTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comment_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CommentType = ClassRegistry::init('CommentType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CommentType);

		parent::tearDown();
	}

}
