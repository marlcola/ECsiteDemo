<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    //デフォルトレイヤ
    public $layout = 'cakephp';

    //コンポーネント設定  
    public $components = array(
        // DebugKit
        'DebugKit.Toolbar',
        //セッションコンポーネント
        'Session',
        //認証コンポーネント
        'Auth' => Array(
            //ログインリダイレクト         
            'loginRedirect' => Array('controller' => 'MItems', 'action' => 'index'),
            //ログアウトリダイレクト            
            'logoutRedirect' => Array('controller' => 'MItems', 'action' => 'index'),
            //ログインアクション
            'loginAction' => Array('controller' => 'MCustomers', 'action' => 'login'),
            //認証オプション
            'authenticate' => Array(
                'Form' => Array(
                    'fields' => Array('username' => 'customer_name'),
                    'userModel' => 'MCustomer',
                    'scope' => array('MCustomer.del_flag' => 0),
                )
            )
        )
    );

    // アクションが実行される前に呼び出されるコールバック関数
    public function beforeFilter() {
        // 認証なしでアクセスできるアクションの指定
        // (beforeFilter()で指定するのがベスト、コントローラ別に指定したほうが良いか？)
//        $this->Auth->allow('index', 'view');
        // ユーザがログインしているかどうか(True or Fales)をビュー変数(loggedIn)にセット
        $this->set('loggedIn', $this->Auth->loggedIn());
    }
    
   

}
