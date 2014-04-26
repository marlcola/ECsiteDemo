<div class="dPurchases view">
<h2><?php  echo __('D Purchase'); ?></h2>
	<dl>
		<dt><?php echo __('Order Id'); ?></dt>
		<dd>
			<?php echo h($dPurchase['DPurchase']['order_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('M Customer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dPurchase['MCustomer']['name'], array('controller' => 'm_customers', 'action' => 'view', $dPurchase['MCustomer']['customer_code'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Purchase Date'); ?></dt>
		<dd>
			<?php echo h($dPurchase['DPurchase']['purchase_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Price'); ?></dt>
		<dd>
			<?php echo h($dPurchase['DPurchase']['total_price']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit D Purchase'), array('action' => 'edit', $dPurchase['DPurchase']['order_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete D Purchase'), array('action' => 'delete', $dPurchase['DPurchase']['order_id']), null, __('Are you sure you want to delete # %s?', $dPurchase['DPurchase']['order_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List D Purchases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New D Purchase'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List M Customers'), array('controller' => 'm_customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New M Customer'), array('controller' => 'm_customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List D Purchase Details'), array('controller' => 'd_purchase_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New D Purchase Detail'), array('controller' => 'd_purchase_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related D Purchase Details'); ?></h3>
	<?php if (!empty($dPurchase['DPurchaseDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Detail Id'); ?></th>
		<th><?php echo __('D Purchase Id'); ?></th>
		<th><?php echo __('M Item Id'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Num'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($dPurchase['DPurchaseDetail'] as $dPurchaseDetail): ?>
		<tr>
			<td><?php echo $dPurchaseDetail['detail_id']; ?></td>
			<td><?php echo $dPurchaseDetail['d_purchase_id']; ?></td>
			<td><?php echo $dPurchaseDetail['m_item_id']; ?></td>
			<td><?php echo $dPurchaseDetail['price']; ?></td>
			<td><?php echo $dPurchaseDetail['num']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'd_purchase_details', 'action' => 'view', $dPurchaseDetail['detail_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'd_purchase_details', 'action' => 'edit', $dPurchaseDetail['detail_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'd_purchase_details', 'action' => 'delete', $dPurchaseDetail['detail_id']), null, __('Are you sure you want to delete # %s?', $dPurchaseDetail['detail_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New D Purchase Detail'), array('controller' => 'd_purchase_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
