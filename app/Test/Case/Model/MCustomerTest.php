<?php
App::uses('MCustomer', 'Model');

/**
 * MCustomer Test Case
 *
 */
class MCustomerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.m_customer',
		'app.d_purchase'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MCustomer = ClassRegistry::init('MCustomer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MCustomer);

		parent::tearDown();
	}

}
