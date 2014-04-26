<?php
App::uses('DPurchaseDetail', 'Model');

/**
 * DPurchaseDetail Test Case
 *
 */
class DPurchaseDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.d_purchase_detail',
		'app.d_purchase',
		'app.order',
		'app.m_customer',
		'app.m_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DPurchaseDetail = ClassRegistry::init('DPurchaseDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DPurchaseDetail);

		parent::tearDown();
	}

}
