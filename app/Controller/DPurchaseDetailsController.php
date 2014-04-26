<?php

App::uses('AppController', 'Controller');

/**
 * DPurchaseDetails Controller
 *
 * @property DPurchaseDetail $DPurchaseDetail
 */
class DPurchaseDetailsController extends AppController {

  
//    public function treeBehavior () {
//        $this->layout = 'test';
//        
//        debug($this->DPurchaseDetail->belongsTo);
//        debug($this->DPurchaseDetail->checkSetup(''));
//    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        debug($this->DPurchaseDetail->alias);
        // 関連モデルのデータを取得する深さを指定
        $this->DPurchaseDetail->recursive = 0;
        // ページネーション機能を利用するための、データをビュー変数に格納
        $this->set('dPurchaseDetails', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        // 引数として渡されたIDを持つデータが存在するか否か
        if (!$this->DPurchaseDetail->exists($id)) {
            // 該当データが存在しない場合は、NotFoundExecptionを返す
            throw new NotFoundException(__('Invalid d purchase detail'));
        }
        // 検索オプション
        $options = array(
            // 検索条件(where)の指定
            'conditions' => array(
                // where DPurchaseDetail.detail_id = ($id)
                'DPurchaseDetail.' . $this->DPurchaseDetail->primaryKey => $id
            ),
            'recursive' => 0
        );
        
        // データを取得して、ビュー変数にセット
        $this->set('dPurchaseDetail', $this->DPurchaseDetail->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        // リクエストの方法がポストであるか否か
        if ($this->request->is('post')) {
            // モデルの状態をリセット
            $this->DPurchaseDetail->create();
            // データの保存
            if ($this->DPurchaseDetail->save($this->request->data)) {
                // 成功メッセージの表示
                $this->Session->setFlash(__('The d purchase detail has been saved'));
                // indexアクションへリダイレクト
                $this->redirect(array('action' => 'index'));
            } else {
                // 失敗メッセージの表示
                $this->Session->setFlash(__('The d purchase detail could not be saved. Please, try again.'));
            }
        }
        
        // 購入テーブルからリストを取得
        $dPurchases = $this->DPurchaseDetail->DPurchase->find('list');
        // 商品テーブルからリストを取得
        $mItems = $this->DPurchaseDetail->MItem->find('list');
        // それぞれのリストをビュー変数に格納する
        $this->set(compact('dPurchases', 'mItems'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        // データの存在確認
        if (!$this->DPurchaseDetail->exists($id)) {
            // 例外処理
            throw new NotFoundException(__('Invalid d purchase detail'));
        }
        // POST/PUTの確認
        if ($this->request->is('post') || $this->request->is('put')) {
            // データの保存
            if ($this->DPurchaseDetail->save($this->request->data)) {
                // 成功メッセージの出力
                $this->Session->setFlash(__('The d purchase detail has been saved'));
                // indexアクションにリダイレクト
                $this->redirect(array('action' => 'index'));
            } else {
                // 失敗メッセージの出力
                $this->Session->setFlash(__('The d purchase detail could not be saved. Please, try again.'));
            }
        } else {
            // 検索条件指定
            $options = array('conditions' => array('DPurchaseDetail.' . $this->DPurchaseDetail->primaryKey => $id));
            // データの取得
            $this->request->data = $this->DPurchaseDetail->find('first', $options);
        }
        // 購入リストの取得
        $dPurchases = $this->DPurchaseDetail->DPurchase->find('list');
        // 商品リストの取得
        $mItems = $this->DPurchaseDetail->MItem->find('list');
        // 各リストをビュー変数に格納
        $this->set(compact('dPurchases', 'mItems'));
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
        // 購入詳細モデルのIDに値を代入
        $this->DPurchaseDetail->id = $id;
        // データの存在確認
        if (!$this->DPurchaseDetail->exists()) {
            // 例外処理
            throw new NotFoundException(__('Invalid d purchase detail'));
        }
        // 意図しないリクエストを弾く
        $this->request->onlyAllow('post', 'delete');
        // データの削除処理
        if ($this->DPurchaseDetail->delete()) {
            // 成功メッセージの出力
            $this->Session->setFlash(__('D purchase detail deleted'));
            // indexアクションにリダイレクト
            $this->redirect(array('action' => 'index'));
        }
        // 失敗メッセージの出力
        $this->Session->setFlash(__('D purchase detail was not deleted'));
        // indexアクションにリダイレクト
        $this->redirect(array('action' => 'index'));
    }

}
