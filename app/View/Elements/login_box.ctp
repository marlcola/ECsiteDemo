<!--ログインエレメント-->
<?php $this->start('login'); ?>   

<h4 class="text-center">ようこそ、<strong>ゲスト</strong> さん</h4>

<div class="row">
    <!--ログインボタン-->
    <div class="col-sm-offset-2 col-sm-8">
        <?php
        echo $this->Html->link('ログイン', '#loginModal', array(
            'class' => 'btn btn-primary btn-block',
            'role' => 'buttun',
            'data-toggle' => 'modal'
        ));
        ?>
    </div>
</div>

<?php $this->end(); ?>
<!--/ログインエレメント-->

<!--ログアウトエレメント-->
<?php $this->start('logout'); ?>

<!--アカウントメッセージ-->
<h4 class="text-center">ようこそ、<strong><?php echo AuthComponent::user('name'); ?></strong> さん</h4>

<!--ログアウトボタン-->
<?php echo $this->Form->create('MCustomer', array('action' => 'logout', 'role' => 'form')); ?>

<?php
echo $this->Form->end(array(
    'label' => 'ログアウト',
    'class' => 'btn btn-primary btn-block',
    'data-toggle' => 'tooltip',
    'data-placement' => 'bottom',
    'data-original-title' => 'おかえりですか？',
    'div' => array(
        'class' => 'col-sm-offset-2 col-sm-8'
    ),
));
?>
<!--/ログアウトボタン-->

<script type="text/javascript">
    $(function() {
        jQuery(function($) {
            $('[data-toggle=tooltip]').tooltip();
        });
    });
</script>

<?php $this->end(); ?>
<!--/ログアウトエレメント-->

<div class="container">
    <?php
    if ($loggedIn) {
        echo $this->fetch('logout');
    } else {
        echo $this->fetch('login');
    }
    ?>
    <?php echo $this->element('login_modal'); ?>
</div>

