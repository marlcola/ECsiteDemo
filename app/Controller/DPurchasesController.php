<?php

App::uses('AppController', 'Controller');

/**
 * DPurchases Controller
 *
 * @property DPurchase $DPurchase
 */
class DPurchasesController extends AppController {

    
    public function beforeFilter() {
        parent::beforeFilter();
        $action = array('cart', 'cart_add', 'cart_delete', 'cart_reset');
        $this->Auth->allow($action);
    }


    /**
     * カートリスト表示
     */
    public function cart() {
        // ECサイトレイアウトに変更
        $this->layout = 'bootstrap_v';
    }
    
    /**
     * カートに商品を追加
     */
    public function cart_add() {
        
        $label = array('label' => '商品追加 : ');
        
        //リクエストのPOST判定
        if ($this->request->is('post')) {
            
            //セッションのカート情報を取得
            if (is_null($cart_list = $this->Session->read('cart'))) {
                
                // カートが空の場合
                $cart_list = array();
                
            }

            // リクエストされた追加購入データを変数に格納
            $data = $this->request->data['DPurchase'];
            
            // セッションのデータにも書き込んでおく
            $this->Session->write('data', $this->request->data);

            
            //セッションのカート情報を削除
            // ここで削除する必要はないのでは？
            $this->Session->delete('cart');

            
            //カートに同じ商品が入っているかチェック
            foreach ($cart_list as $key => $value) {
                
                // 同じ商品がある場合
                if ($value['item_code'] == $data['item_code']) {
                    
                    // リクエストされた購入データに、カートの数量を足す
                    $data['num'] += $value['num'] + 1;
                    
                    // カートのデータを削除する
                    unset($cart_list[$key]);
                    
                    break;
                    
                }
            }

            //取得したカート情報配列に、リクエストされた購入データを追加
            array_push($cart_list, $data);

            //リクエストされた購入データを追加したカート情報配列を、セッションに書込み
            if ($this->Session->write('cart', $cart_list)) {
                
                $this->Session->setFlash(__('カートに追加しました。'), 'success', $label, 'cart');
                
                $this->redirect(array('action' => 'cart'));
                
            }
            
        }
        // ここで、変更前のcartに戻す必要が有るのではないだろうか？
        
        $this->Session->setFlash(__('商品追加に失敗しました。'), 'fail', $label, 'cart');
        
        $this->redirect(array('action' => 'cart'));
        
    }

    /**
     * カートリストの商品を削除
     */
    public function cart_delete($id = null) {
        
        $label = array('label' => '商品削除 : ');
        
        //セッションにおける削除対象データの存在確認
        if ($this->Session->check('cart.' . $id)) {
            
            //データ削除
            if ($this->Session->delete('cart.' . $id)) {
                
                $this->Session->setFlash(__('商品を削除しました。'), 'success', $label, 'cart');
                
                $this->redirect(array('action' => 'cart'));
                
            }
        }
        
        $this->Session->setFlash(__('商品の削除に失敗しました。'), 'fail', $label, 'cart');
        
        $this->redirect(array('action' => 'cart'));
    }

    /**
     * カートリストをリセット
     */
    public function cart_reset() {
        
        $label = array('label' => 'カートリセット : ');

        //セッションのカート情報を削除
        if ($this->Session->delete('cart')) {
            
            $this->Session->setFlash(__('カートを空にしました。'), 'success', $label, 'cart');
            
            $this->redirect(array('action' => 'cart'));
            
        }
        
        $this->Session->setFlash(__('カートリセットに失敗しました。'), 'fail', $label, 'cart');
        
        $this->redirect(array('action' => 'cart'));
        
    }

    public function purchase() {
        
        $label = array('label' => '商品購入 : ');

        //セッションにおけるカート情報の存在確認
        if ($this->Session->check('cart')) {
            
            //商品合計
            $total_price = 0;
            
            //購入詳細配列の初期化
            $details = array();

            //データベースに保存するデータの属性リスト
            $purchase_fieldList = array('m_customer_id', 'purchase_date', 'total_price');
            
            $detail_fieldList = array('m_item_id', 'price', 'num');
            
            $fieldList = array(
                
                'DPurchase' => $purchase_fieldList,
                
                'DPurchaseDetail' => $detail_fieldList,
                
            );


            //商品合計の算出と、購入詳細配列へのデータ追加
            foreach ($this->Session->read('cart') as $item) {
                
                // 価格に数量をかけて、足しあわせていく
                $total_price += $item['price'] * ($item['num'] + 1);
                
                // 購入詳細データを配列に格納していく
                array_push($details, array(
                    
                    // 商品コード
                    'm_item_id' => $item['item_code'],
                    
                    // 価格
                    'price' => $item['price'],
                    
                    // 数量
                    'num' => $item['num']
                        
                ));
            }

            //保存するデータ配列作成
            $data = array(
                
                // 購入データ
                'DPurchase' => array(
                    
                    // 購入者ID
                    'm_customer_id' => $this->Auth->user('customer_code'),
                    
                    // 購入年月日
                    'purchase_date' => date("Y-m-d"),
                    
                    // 購入金額合計
                    'total_price' => $total_price,
                    
                ),
                
                // 購入詳細データの配列
                'DPurchaseDetail' => $details,
                
            );

            // 購入モデルの初期化
            $this->DPurchase->create();

            // 購入データと購入詳細データを一緒に保存
            if ($this->DPurchase->saveAssociated($data, array('deep' => TRUE, 'fieldList' => $fieldList))) {

                //カートを空にする
                // 処理の成否判定が必要なのでは？
                $this->Session->delete('cart');
                
                $this->Session->setFlash(__('購入処理を完了しました。'), 'success', $label, 'cart');

                $this->redirect(array('action' => 'cart'));
                
            } else {
                
                $this->Session->setFlash(__('購入処理に失敗しました。'), 'fail', $label, 'cart');
                
                $this->redirect(array('action' => 'cart'));
                
            }
            
        } else {
            
            $this->Session->setFlash(__('カートの中が空です。'), 'fail', $label, 'cart');
            
            $this->redirect(array('action' => 'cart'));
            
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        
        $this->DPurchase->recursive = 0;
        
        $this->set('dPurchases', $this->paginate());
        
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        
        if (!$this->DPurchase->exists($id)) {
            throw new NotFoundException(__('Invalid d purchase'));
        }
        
        $options = array('conditions' => array('DPurchase.' . $this->DPurchase->primaryKey => $id));
        
        $this->set('dPurchase', $this->DPurchase->find('first', $options));
        
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        
        if ($this->request->is('post')) {
            
            $this->DPurchase->create();
            
            if ($this->DPurchase->save($this->request->data)) {
                
                $this->Session->setFlash(__('The d purchase has been saved'));
                
                $this->redirect(array('action' => 'index'));
                
            } else {
                
                $this->Session->setFlash(__('The d purchase could not be saved. Please, try again.'));
                
            }
            
        }
        
        $mCustomers = $this->DPurchase->MCustomer->find('list');
        
        $this->set(compact('mCustomers'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        
        if (!$this->DPurchase->exists($id)) {
            
            throw new NotFoundException(__('Invalid d purchase'));
            
        }
        
        if ($this->request->is('post') || $this->request->is('put')) {
            
            if ($this->DPurchase->save($this->request->data)) {
                
                $this->Session->setFlash(__('The d purchase has been saved'));
                
                $this->redirect(array('action' => 'index'));
                
            } else {
                
                $this->Session->setFlash(__('The d purchase could not be saved. Please, try again.'));
                
            }
            
        } else {
            
            $options = array('conditions' => array('DPurchase.' . $this->DPurchase->primaryKey => $id));
            
            $this->request->data = $this->DPurchase->find('first', $options);
            
        }
        
        $mCustomers = $this->DPurchase->MCustomer->find('list');
        
        $this->set(compact('mCustomers'));
        
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        
        $this->DPurchase->id = $id;
        
        if (!$this->DPurchase->exists()) {
            
            throw new NotFoundException(__('Invalid d purchase'));
            
        }
        
        $this->request->onlyAllow('post', 'delete');
        
        if ($this->DPurchase->delete()) {
            
            $this->Session->setFlash(__('D purchase deleted'));
            
            $this->redirect(array('action' => 'index'));
            
        }
        
        $this->Session->setFlash(__('D purchase was not deleted'));
        
        $this->redirect(array('action' => 'index'));
        
    }

}
