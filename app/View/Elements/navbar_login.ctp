<!--ログインエレメント-->
<?php $this->start('login'); ?>   

<?php
echo $this->Html->link('ログイン', '#loginModal', array(
    'data-toggle' => 'modal',
    'class' => 'btn btn-primary navbar-btn navbar-right',
    'role' => 'button'
));
?> 

<p class="navbar-text navbar-right">ようこそ <strong>ゲスト</strong> さん</p>

<?php $this->end(); ?>
<!--/ログインエレメント-->

<!--ログアウトエレメント-->
<?php $this->start('logout'); ?>

<?php
echo $this->Html->link(
        'ログアウト', array(
    'controller' => 'MCustomers',
    'action' => 'logout'
        ), array(
    'class' => 'btn btn-primary navbar-btn navbar-right',
    'role' => 'button'
        )
);
?> 

<!--アカウントメッセージ-->
<p class="navbar-text navbar-right">ようこそ <strong><?php echo AuthComponent::user('name'); ?></strong> さん</p>

<?php $this->end(); ?>
<!--/ログアウトエレメント-->

<?php
if ($loggedIn) {
    
    echo $this->fetch('logout');
    
} else {
    
    echo $this->fetch('login');
    
}
?>



