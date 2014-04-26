<?php
/**
 * MCustomerFixture
 *
 */
class MCustomerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'customer_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'comment' => '会員コード', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => '会員氏名', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => '会員住所', 'charset' => 'utf8'),
		'tel' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => '会員電話', 'charset' => 'utf8'),
		'mail' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'comment' => '会員メール', 'charset' => 'utf8'),
		'del_flag' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '解除フラグ（１：解除済）'),
		'reg_date' => array('type' => 'date', 'null' => true, 'default' => null, 'comment' => '登録日'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'customer_code', 'unique' => 1)
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
			'customer_code' => 'Lorem ipsum dolor ',
			'password' => 'Lorem ipsum dolor ',
			'name' => 'Lorem ipsum dolor ',
			'address' => 'Lorem ipsum dolor sit amet',
			'tel' => 'Lorem ipsum dolor ',
			'mail' => 'Lorem ipsum dolor sit amet',
			'del_flag' => 1,
			'reg_date' => '2013-03-20'
		),
	);

}
