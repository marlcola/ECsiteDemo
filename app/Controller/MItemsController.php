<?php

App::uses('AppController', 'Controller');

/**
 * MItems Controller
 *
 * @property MItem $MItem
 */
class MItemsController extends AppController {

    /**
     * アクションの前処理
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $action = array('index', 'view');
        $this->Auth->allow($action);
    }

    /**
     * 商品一覧表示
     *
     * @return void
     */
    public function index() {
        // ECサイトレイアウトに変更
        $this->layout = 'bootstrap_v';
        // 探索の深さを指定
        $this->MItem->recursive = 0;

        //参照する属性の指定
        $opt_fields = array('item_code', 'price', 'item_name', 'image');

        //検索条件
        $opt_conditions = array(
            //削除フラグ
            'MItem.del_flag' => 0
        );

        $data = $this->request->data;
        //検索条件追加
        //検索要件の有無
        if (!empty($data)) {
            
            $item_name = $data['MItem']['item_name'];
            
            //商品名指定の有無
            if (!empty($item_name)) {
                
                //商品名条件の追加
                $opt_conditions['MItem.item_name LIKE'] = '%' . $item_name . '%';
            }
            
            //カテゴリ指定の有無
            if (array_key_exists('category', $data['MItem'])) {
                
                //カテゴリ番号配列
                $category_opt = array();
                
                foreach ($data['MItem']['category'] as $value) {
                        
                    $category_opt[] = $value;
                    
                }
                //カテゴリ条件の追加
                $opt_conditions['MItem.category'] = $category_opt;
            }
        }

        //データベース検索
        $MItems = $this->MItem->find('all', array(
            'fields' => $opt_fields,
            'conditions' => $opt_conditions
        ));

        //ビュー変数セット
        $this->set('mItems', $MItems);
    }

    /**
     * 商品詳細表示
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        // ECサイトレイアウトに変更
        $this->layout = 'bootstrap_v';
        // 指定されたIDを持つデータの存在確認
        if (!$this->MItem->exists($id)) {
            throw new NotFoundException(__('Invalid m item'));
        }
        // 検索条件としてIDを指定
        $options = array('conditions' => array('MItem.' . $this->MItem->primaryKey => $id));
        // 検索して、結果をビュー変数に格納
        $this->set('mItem', $this->MItem->find('first', $options));
    }

    /**
     * 商品追加
     *
     * @return void
     */
    public function add() {
        // POSTリクエストの検証
        if ($this->request->is('post')) {
            // 商品モデルの初期化
            $this->MItem->create();
            // 商品データの保存
            if ($this->MItem->save($this->request->data)) {
                // 成功メッセージ
                $this->Session->setFlash(__('The m item has been saved'));
                // indexアクションにリダイレクト
                $this->redirect(array('action' => 'index'));
            } else {
                // 失敗メッセージ
                $this->Session->setFlash(__('The m item could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * 商品編集
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        //
        if (!$this->MItem->exists($id)) {
            throw new NotFoundException(__('Invalid m item'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->MItem->save($this->request->data)) {
                $this->Session->setFlash(__('The m item has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The m item could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('MItem.' . $this->MItem->primaryKey => $id));
            $this->request->data = $this->MItem->find('first', $options);
        }
    }

    /**
     * 商品削除
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->MItem->id = $id;
        if (!$this->MItem->exists()) {
            throw new NotFoundException(__('Invalid m item'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->MItem->delete()) {
            $this->Session->setFlash(__('M item deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('M item was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
