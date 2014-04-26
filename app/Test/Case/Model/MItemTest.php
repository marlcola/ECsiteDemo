<?php
App::uses('MItem', 'Model');

/**
 * MItem Test Case
 *
 */
class MItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.m_item',
		'app.d_purchase_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MItem = ClassRegistry::init('MItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MItem);

		parent::tearDown();
	}

}
