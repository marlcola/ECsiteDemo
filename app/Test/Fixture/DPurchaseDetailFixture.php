<?php
/**
 * DPurchaseDetailFixture
 *
 */
class DPurchaseDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'detail_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => '購入詳細ID'),
		'd_purchase_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'key' => 'index', 'comment' => '購入ID'),
		'm_item_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index', 'comment' => '商品コード'),
		'price' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '決済時商品単価'),
		'num' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '数量'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'detail_id', 'unique' => 1),
			'd_purchase_id' => array('column' => 'd_purchase_id', 'unique' => 0),
			'm_item_id' => array('column' => 'm_item_id', 'unique' => 0)
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
			'detail_id' => '',
			'd_purchase_id' => '',
			'm_item_id' => 1,
			'price' => 1,
			'num' => 1
		),
	);

}
