<!--ログインボタン（仮）-->
<a href="#loginModal" class="btn btn-primary" role="button" data-toggle="modal">ログインボタン（仮）</a>

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
                <!--モーダルのタイトル-->
                <h2 class="modal-title">ログイン</h2>
            </div>
            <!--モーダルボディ-->
            <div class="modal-body">
                <!--ログインメッセージ-->
                <p><strong>ログインID</strong>と<strong>パスワード</strong>を入力してください。</p>
                <?php echo $this->Form->create('MCustomer'); ?>


                <?php
                echo $this->Form->input('customer_name', array(
                    'div' => array('class' => 'form-group'),
                    'label' => array('text' => 'ログインID', 'for' => 'MCustomerCustomerName', 'class' => 'control-label'),
                    'class' => 'form-control',
                    'placeholder' => '例：masaki'
                ));
                ?>

                <?php
                echo $this->Form->input('password', array(
                    'div' => array('class' => 'form-group'),
                    'label' => array('text' => 'パスワード', 'for' => 'MCustomerPassword', 'class' => 'control-label'),
                    'class' => 'form-control',
                )); ?>

                <?php
                echo $this->Form->end(array(
                    'id' => 'innerFormSubmit',
                    'div' => FALSE,
                    'style' => 'display: none'
                ));
                ?>
            </div>
            <!--モーダルフッタ-->
            <div class="modal-footer">
                <!--キャンセルボタン-->
                <button class="btn" data-dismiss="modal">キャンセル</button>
                <!--ログインボタン-->
                <button class="btn btn-primary">ログイン！！</button>
                <?php echo $this->Form->submit('ログイン', array(
                    'id' => 'outerFormSubmit',
                    'div' => FALSE,
                    'class' => 'btn btn-primary'
                )); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('#outerFormSubmit').click(function() {
            $('#innerFormSubmit').click();
        });
    });
</script>

<?php echo $this->Session->flash('auth_fail'); ?>
