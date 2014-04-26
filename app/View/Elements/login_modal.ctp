<!--ログイン用モーダル-->
<div id="loginModal" class="modal fade" role="dialog">
    <!--モーダルダイアログ-->
    <div class="modal-dialog">
        <!--モーダルコンテンツ-->
        <div class="modal-content">
            
            <!--モーダルヘッダ-->
            <div class="modal-header">
                <!--モーダルを閉じるボタン-->
                <button class="close" data-dismiss="modal" >&times;</button>
                <h2 class="modal-title">ログイン</h2>
            </div>
            <!--/モーダルヘッダ-->
            
            <!--モーダルボディ-->
            <div class="modal-body">
                
                <!--ログインフォーム生成-->
                <?php echo $this->Form->create(null, array(
                    'id' => 'MCustomerLoginForm',
                    'url' => array(
                        'controller' => 'MCustomers', 
                        'action' => 'login'
                        ), 
                    'role' => 'form'
                    )); ?>
                
                <!--顧客ID の入力フォーム-->
                <?php
                echo $this->Form->input('MCustomer.customer_name', array(
                    'id' => 'MCustomerLoginCustomerName',
                    'div' => array('class' => 'form-group'),
                    'label' => array(
                        'text' => 'ログインID', 
                        'for' => 'MCustomerCustomerName', 
                        'class' => 'control-label'
                        ),
                    'class' => 'form-control',
                    'placeholder' => '例：masaki'
                ));
                ?>
                
                <!--パスワードの入力フォーム-->
                <?php
                echo $this->Form->input('MCustomer.password', array(
                    'id' => 'MCustomerLoginPassword',
                    'div' => array('class' => 'form-group'),
                    'label' => array(
                        'text' => 'パスワード', 
                        'for' => 'MCustomerLoginPassword', 
                        'class' => 'control-label'
                        ),
                    'class' => 'form-control',
                )); ?>
                <!--ログインフォームの終わり-->
                <!--submit ボタンの id に innerFormSubmit を指定-->
                <!--非表示にする-->
                <?php
                echo $this->Form->end(array(
                    'id' => 'InnerLoginFormSubmit',
                    'div' => array('class' => 'form-group'),
                    'style' => 'display: none'
                ));
                ?>
            </div>
            <!--/モーダルボディ-->
            
            <!--モーダルフッタ-->
            <div class="modal-footer">
                <!--キャンセルボタン-->
                <button type="button" class="btn" data-dismiss="modal">キャンセル</button>
                <!--ログインフォームの外側に置く submit ボタン-->
                <!--id に outerFormSubmit を置く-->
                <button type="button" id="OuterLoginFormSubmit" class="btn btn-primary">ログイン</button>
            </div>
            <!--モーダルフッタ-->
            
        </div>
        <!--/モーダルコンテンツ-->
    </div>
    <!--/モーダルダイアログ-->
</div>
<!--/ログイン用モーダル-->
