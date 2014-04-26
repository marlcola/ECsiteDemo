<?php
App::uses('DPurchase', 'Model');

/**
 * DPurchase Test Case
 *
 */
class DPurchaseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.d_purchase',
		'app.order',
		'app.m_customer',
		'app.d_purchase_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DPurchase = ClassRegistry::init('DPurchase');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DPurchase);

		parent::tearDown();
	}

}
