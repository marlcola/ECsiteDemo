<?php

App::uses('AppController', 'Controller');

/**
 * MCustomers Controller
 *
 * @property MCustomer $MCustomer
 */
class MCustomersController extends AppController {

    /**
     * beforeFilter
     * 
     * @return void
     */
    public function beforeFilter() {
        // AppControllerのbeforFilter処理
        parent::beforeFilter();
        //認証無しで利用できるアクション
        $this->Auth->allow('add');
    }

    /**
     * login method
     * 
     * @return type
     */
    public function login() {
        // ECサイトレイアウトに変更
        $this->layout = 'bootstrap_v';
        // ログインの有無
        if ($this->Auth->loggedIn()) {
            // リダイレクト
            return $this->redirect($this->Auth->loginRedirect);
        }
        
        // POSTリクエストの検証
        if ($this->request->is('post')) {
            // ログイン処理
            if ($this->Auth->login()) {
                // リダイレクト
                return $this->redirect($this->Auth->redirect());
            } else {
                // 失敗メッセージ
                $this->Session->setFlash(__('ユーザ名もしくはパスワードが正しくありません'), 'fail', array('label' => 'ログインエラー : '), 'flash');
                return $this->redirect($this->Auth->redirect());
            }
        }else{
//            $this->redirect('#login_modal');
        }
        debug($this->request->method());
    }

    /**
     * logout method
     * 
     * @param type $id
     */
    public function logout($id = null) {
        // ログアウト処理
        $this->redirect($this->Auth->logout());
    }

    /**
     * index method     
     *
     * @return void
     */
    public function index() {
        // 探索する深さを指定
        $this->MCustomer->recursive = 0;
        // ページネイト機能を使って、データを取得
        $this->set('mCustomers', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        // データの存在確認
        if (!$this->MCustomer->exists($id)) {
            // 例外処理
            throw new NotFoundException(__('Invalid m customer'));
        }
        // 検索条件の指定
        $options = array('conditions' => array('MCustomer.' . $this->MCustomer->primaryKey => $id));
        // データを取得して、ビュー変数に格納
        $this->set('mCustomer', $this->MCustomer->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        // ECサイトレイアウトに変更
        $this->layout = 'bootstrap_v';

        // メッセージラベル
        $label = array('label' => 'ユーザ登録 : ');
        
        // POSTリクエストの検証
        if ($this->request->is('post')) {
            // 顧客モデルの初期化
            $this->MCustomer->create();
            // データの保存
            if ($this->MCustomer->save($this->request->data)) {
                // 成功メッセージ
                $this->Session->setFlash(__('ユーザ登録完了!!'), 'success', $label, 'flash');
                // loginアクションへリダイレクト
                $this->redirect(array('controller' => 'MItems', 'action' => 'index'));
            } else {
                // 失敗メッセージ
                $this->Session->setFlash(__('ユーザ登録失敗!? もう一度試してみて!!', 'fail', $label, 'flash'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit() {
        // ECサイトレイアウトに変更
        $this->layout = 'bootstrap_v';

        // メッセージラベル
        $label = array('label' => 'ユーザ情報変更 : ');
        
        //ログインID
        $id = $this->Auth->user('customer_code');

        //ログインIDの存在確認
        if (!$this->MCustomer->exists($id)) {
            // 例外処理
            throw new NotFoundException(__('Invalid m customer'));
        }
        //POST/PUTリクエストの検証
        if ($this->request->is('post') || $this->request->is('put')) {
            //リクエストデータをデータベースへ保存
            if ($this->MCustomer->save($this->request->data)) {
                // 成功メッセージ
                $this->Session->setFlash(__('ユーザ情報変更完了!!'), 'success', $label, 'flash');
                // indexアクションにリダイレクト
                $this->redirect(array('controller' => 'MItems', 'action' => 'index'));
            } else {
                // 失敗メッセージ
                $this->Session->setFlash(__('ユーザ情報変更失敗!? もう一度試してみて!!'), 'fail', $label, 'flash');
            }
        } else {
            // 検索条件の指定
            $options = array('conditions' => array('MCustomer.' . $this->MCustomer->primaryKey => $id));
            // 取得したデータを、リクエストデータに格納
            $this->request->data = $this->MCustomer->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete() {

        // メッセージラベル
        $label = array('label' => '退会 : ');
        
        //ログインID
        $this->MCustomer->id = $this->Auth->user('customer_code');

        //ログインIDの存在確認
        if (!$this->MCustomer->exists()) {
            throw new NotFoundException(__('Invalid m customer'));
        }

        // 削除フラグを立てる
        if ($this->MCustomer->save(array('del_flag' => '1'), array('fieldList' => array('del_flag')))) {
            // 成功メッセージ
            $this->Session->setFlash(__('退会処理完了!!'), 'success', $label, 'flash');
            // logoutアクションにリダイレクト
            $this->redirect($this->Auth->logout());
        }

//        $this->request->onlyAllow('post', 'delete');
//        
//        if ($this->MCustomer->delete()) {
//            $this->Session->setFlash(__('M customer deleted'));
//            $this->redirect(array('action' => 'index'));
//        }
        // 失敗メッセージ
        $this->Session->setFlash(__('退会処理失敗!!　もう一度試してみて!!'), 'fail', $label, 'flash');
        // indexアクションにリダイレクト
        $this->redirect(array('controller' => 'MItems', 'action' => 'index'));
    }

}
