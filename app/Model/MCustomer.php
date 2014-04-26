<?php

App::uses('AppModel', 'Model');

/**
 * MCustomer Model
 *
 * @property DPurchase $DPurchase
 */
class MCustomer extends AppModel {

    // モデルプロパティの設定
    public $useTable = 'm_customers';   // テーブル名の指定
    public $primaryKey = 'customer_code'; // 主キー属性の指定
    public $displayField = 'customer_name'; // リスト表示する属性
    public $recursive = -1; // データ探索の深さ
    public $order = 'MCustomer.customer_code asc'; // データ順序
    public $name = 'MCustomer'; // モデル名

    
    // バリデーションの設定
    public $validate = array(
        // ログインID のバリデーション
        'customer_name' => array(
            // 空は不可
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        // パスワードのバリデーション
        'password' => array(
            // 空は不可
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        // 氏名のバリデーション
        'name' => array(
            // 空は不可
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //アソシエーションの設定
    // 一対多のリレーション
    public $hasMany = array(
        'DPurchase' => array(
            'className' => 'DPurchase',
            'foreignKey' => 'm_customer_id',
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

    // 
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = 
                    AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

}
