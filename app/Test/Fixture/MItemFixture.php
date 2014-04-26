<?php
/**
 * MItemFixture
 *
 */
class MItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'item_code' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => '商品コード'),
		'item_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '商品名', 'charset' => 'utf8'),
		'price' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '商品単価（税抜）'),
		'category' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => 'カテゴリ（１．管楽器、２．弦楽器、３．打楽器）'),
		'image' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'comment' => '画像（画像そのものではない）', 'charset' => 'utf8'),
		'detail' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'comment' => '詳細説明', 'charset' => 'utf8'),
		'del_flag' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => '解除フラグ（１：解除済）'),
		'reg_date' => array('type' => 'date', 'null' => true, 'default' => null, 'comment' => '登録日'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'item_code', 'unique' => 1)
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
			'item_code' => 1,
			'item_name' => 'Lorem ipsum dolor sit amet',
			'price' => 1,
			'category' => 1,
			'image' => 'Lorem ipsum dolor sit amet',
			'detail' => 'Lorem ipsum dolor sit amet',
			'del_flag' => 1,
			'reg_date' => '2013-03-20'
		),
	);

}
