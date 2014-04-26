<!--MCustomers コントローラの add アクションに POST--> 
<!--垂直フォーム-->
<?php
echo $this->Form->create(null, array(
    'url' => array(
        'controller' => 'MCustomers',
        'action' => $MCustomerAction,
    ),
    'class' => 'form-horizontal',
    'role' => 'form'
));
?>

<?php
$readonly = '';
$submitText = '登録';

if ($MCustomerAction == 'edit') {
    $readonly = 'readonly';
    $submitText = '変更';
    echo $this->Form->input('customer_code', array(
        'type' => 'hidden',
        'div' => FALSE,
        'label' => FALSE,
        $readonly
    ));
}
?>


<!--ログインID の入力フォーム-->
<div class="form-group">
    <!--ラベル-->
    <label for="MCustomerCustomerName" class="col-sm-3 control-label">ログインID : </label>
    <!--入力フォーム-->
    <div class="col-sm-9">
        <?php
        echo $this->Form->input('MCustomer.customer_name', array(
            'div' => FALSE,
            'label' => FALSE,
            'class' => 'form-control',
            'placeholder' => '例：masaki',
            $readonly
        ));
        ?>
        <!--ヘルプテキスト-->
        <spen class="help-block">form help</spen>
    </div>
    <!--/入力フォーム-->
</div>
<!--/ログインID の入力フォーム-->

<!--パスワードの入力フォーム-->
<div class="form-group">
    <!--ラベル-->
    <label for="MCustomerPassword" class="col-sm-3 control-label">パスワード : </label>
    <!--入力フォーム-->
    <div class="col-sm-9">
        <?php
        echo $this->Form->input('MCustomer.password', array(
            'div' => FALSE,
            'label' => FALSE,
            'class' => 'form-control',
            $readonly
        ));
        ?>
        <!--ヘルプテキスト-->
        <spen class="help-block">form help</spen>
    </div>
    <!--/入力フォーム-->
</div>
<!--/パスワードの入力フォーム-->

<!--氏名の入力フォーム-->
<div class="form-group">
    <!--ラベル-->
    <label for="MCustomerName" class="col-sm-3 control-label">氏名 : </label>
    <!--入力フォーム-->
    <div class="col-sm-9">
        <?php
        echo $this->Form->input('MCustomer.name', array(
            'div' => FALSE,
            'label' => FALSE,
            'class' => 'form-control',
            'placeholder' => '例：森　雅樹'
        ));
        ?>
        <!--ヘルプテキスト-->
        <spen class="help-block">form help</spen>
    </div>
    <!--/入力フォーム-->
</div>
<!--/氏名の入力フォーム-->

<!--住所の入力フォーム-->
<div class="form-group">
    <!--ラベル-->
    <label for="MCustomerAddress" class="col-sm-3 control-label">住所 : </label>
    <!--入力フォーム-->
    <div class="col-sm-9">
        <?php
        echo $this->Form->input('MCustomer.address', array(
            'div' => FALSE,
            'label' => FALSE,
            'class' => 'form-control',
            'placeholder' => '例：北海道札幌市北区東1条西3丁目1番1号　○○ハイツ　204号室'
        ));
        ?>
        <!--ヘルプテキスト-->
        <spen class="help-block">form help</spen>
    </div>
    <!--/入力フォーム-->
</div>
<!--/住所の入力フォーム-->

<!--電話番号の入力フォーム-->
<div class="form-group">
    <!--ラベル-->
    <label for="MCustomerTel" class="col-sm-3 control-label">電話番号 : </label>
    <!--入力フォーム-->
    <div class="col-sm-9">
        <?php
        echo $this->Form->input('MCustomer.tel', array(
            'div' => FALSE,
            'label' => FALSE,
            'class' => 'form-control',
            'placeholder' => '例：012-345-6789'
        ));
        ?>
        <!--ヘルプテキスト-->
        <spen class="help-block">form help</spen>
    </div>
    <!--/入力フォーム-->
</div>
<!--/電話番号の入力フォーム-->

<!--Emailの入力フォーム-->
<div class="form-group">
    <!--ラベル-->
    <label for="MCustomerEmail" class="col-sm-3 control-label">Email : </label>
    <!--入力フォーム-->
    <div class="col-sm-9">
        <?php
        echo $this->Form->input('MCustomer.email', array(
            'div' => FALSE,
            'label' => FALSE,
            'class' => 'form-control',
            'placeholder' => '例：masaki@gmail.com'
        ));
        ?>
        <!--ヘルプテキスト-->
        <spen class="help-block">form help</spen>
    </div>
    <!--/入力フォーム-->
</div>
<!--/Emailの入力フォーム-->

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        <?php
        echo $this->Form->end(array(
            'label' => $submitText,
            'div' => FALSE,
            'class' => 'btn btn-primary btn-block',
        ));
        ?>    
    </div>
</div>
