<?php

App::uses('AppModel', 'Model');

/**
 * MItem Model
 *
 * @property DPurchaseDetail $DPurchaseDetail
 */
class MItem extends AppModel {

    //モデルプロパティの設定
    public $useTable = 'm_items';   // テーブル名の指定
    public $primaryKey = 'item_code'; // 主キー属性の指定
    public $displayField = 'item_name'; // リスト表示する属性
    public $recursive = -1; // データ探索の深さ
    public $order = 'MItem.item_code asc'; // データ順序
    public $name = 'MItem'; // モデル名
    
    
    // アソシエーションの設定
    // 一対多のリレーション
    public $hasMany = array(
        'DPurchaseDetail' => array( // アソシエーション名
            'className' => 'DPurchaseDetail',   // 関連先モデルクラス名
            'foreignKey' => 'm_item_id',    // 関連先の外部キー
            'dependent' => false,   // 独立性
            'conditions' => '', // 絞り込み条件
            'fields' => '', // 属性
            'order' => '',  // データ順序
            'limit' => '',  // データの最大件数
            'offset' => '', // データのスキップ件数
            'exclusive' => false,  // 再帰的削除の無効化
            'finderQuery' => '',    // データ取得時に利用するSQLクエリの指定
            'counterQuery' => ''    //  
        )
    );


}
