<?php

App::uses('AppModel', 'Model');

/**
 * DPurchaseDetail Model
 *
 * @property DPurchase $DPurchase
 * @property MItem $MItem
 */
class DPurchaseDetail extends AppModel {

    // Behaviorの設定
    //public $actsAs = array('Test');
    
    // プライマリキーの設定
    public $useTable = 'd_purchase_details';   // テーブル名の指定
    public $primaryKey = 'detail_id'; // 主キー属性の指定
    public $displayField = 'detail_id'; // リスト表示する属性
    public $recursive = -1; // データ探索の深さ
    public $order = 'DPurchaseDetail.detail_id asc'; // データ順序
    public $name = 'DPurchaseDetail'; // モデル名
    
    // アソシエーションの設定
    // 多対一のリレーション
    public $belongsTo = array(
        'DPurchase' => array(
            'className' => 'DPurchase',
            'foreignKey' => 'd_purchase_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'MItem' => array(
            'className' => 'MItem',
            'foreignKey' => 'm_item_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    
    

}
