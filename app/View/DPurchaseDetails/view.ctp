<div class="dPurchaseDetails view">
<h2><?php  echo __('D Purchase Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Detail Id'); ?></dt>
		<dd>
			<?php echo h($dPurchaseDetail['DPurchaseDetail']['detail_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('D Purchase'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dPurchaseDetail['DPurchase']['order_id'], array('controller' => 'd_purchases', 'action' => 'view', $dPurchaseDetail['DPurchase']['order_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('M Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dPurchaseDetail['MItem']['item_code'], array('controller' => 'm_items', 'action' => 'view', $dPurchaseDetail['MItem']['item_code'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($dPurchaseDetail['DPurchaseDetail']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num'); ?></dt>
		<dd>
			<?php echo h($dPurchaseDetail['DPurchaseDetail']['num']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit D Purchase Detail'), array('action' => 'edit', $dPurchaseDetail['DPurchaseDetail']['detail_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete D Purchase Detail'), array('action' => 'delete', $dPurchaseDetail['DPurchaseDetail']['detail_id']), null, __('Are you sure you want to delete # %s?', $dPurchaseDetail['DPurchaseDetail']['detail_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List D Purchase Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New D Purchase Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List D Purchases'), array('controller' => 'd_purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New D Purchase'), array('controller' => 'd_purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List M Items'), array('controller' => 'm_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New M Item'), array('controller' => 'm_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
