<!--商品一覧-->
<li> <?php echo $this->Html->link('商品一覧', array('controller' => 'MItems', 'action' => 'index', '#' => 'item_list')); ?></li>
<!--カートの中-->
<li> <?php echo $this->Html->link('カートの中', array('controller' => 'DPurchases', 'action' => 'cart')); ?></li>

<?php $this->start('customer_edit'); ?>

<!-- 登録情報-->
<li> <?php echo $this->Html->link('登録情報', array('controller' => 'MCustomers', 'action' => 'edit')); ?></li>
<!-- 退会 -->
<li> <?php echo $this->Html->link('退会', array('controller' => 'MCustomers', 'action' => 'delete')); ?></li>

<?php $this->end(); ?>

<?php $this->start('customer_add'); ?>

<!--新規登録-->
<li> <?php echo $this->Html->link('新規登録', array('controller' => 'MCustomers', 'action' => 'add')); ?></li>

<?php $this->end(); ?>

<?php
if ($loggedIn) {
    echo $this->fetch('customer_edit');
} else {
    echo $this->fetch('customer_add');
}
?>


