<?php

App::uses('AppModel', 'Model');

/**
 * DPurchase Model
 *
 * @property MCustomer $MCustomer
 * @property DPurchaseDetail $DPurchaseDetail
 */
class DPurchase extends AppModel {

    // プライマリキーの設定
    public $useTable = 'd_purchases';   // テーブル名の指定
    public $primaryKey = 'order_id'; // 主キー属性の指定
    public $displayField = 'order_id'; // リスト表示する属性
    public $recursive = -1; // データ探索の深さ
    public $order = 'DPurchase.order_id asc'; // データ順序
    public $name = 'DPurchase'; // モデル名
    //
    // アソシエーションの設定
    // 多対一のリレーション
    public $belongsTo = array(
        'MCustomer' => array(
            'className' => 'MCustomer',
            'foreignKey' => 'm_customer_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    // 一対多のリレーション
    public $hasMany = array(
        'DPurchaseDetail' => array(
            'className' => 'DPurchaseDetail',
            'foreignKey' => 'd_purchase_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => false,
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
