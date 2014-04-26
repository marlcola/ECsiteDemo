<?php
/**
 * DPurchaseFixture
 *
 */
class DPurchaseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'order_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => '購入ID'),
		'm_customer_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'key' => 'index', 'collate' => 'utf8_general_ci', 'comment' => '顧客コード', 'charset' => 'utf8'),
		'purchase_date' => array('type' => 'date', 'null' => true, 'default' => null, 'comment' => '購入日'),
		'total_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '決済時金額'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'order_id', 'unique' => 1),
			'm_customer_id' => array('column' => 'm_customer_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'order_id' => '',
			'm_customer_id' => 'Lorem ipsum dolor ',
			'purchase_date' => '2013-03-20',
			'total_price' => 1
		),
	);

}
