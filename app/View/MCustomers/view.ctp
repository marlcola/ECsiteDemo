<div class="mCustomers view">
<h2><?php  echo __('M Customer'); ?></h2>
	<dl>
		<dt><?php echo __('Customer Code'); ?></dt>
		<dd>
			<?php echo h($mCustomer['MCustomer']['customer_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer Name'); ?></dt>
		<dd>
			<?php echo h($mCustomer['MCustomer']['customer_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($mCustomer['MCustomer']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($mCustomer['MCustomer']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($mCustomer['MCustomer']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel'); ?></dt>
		<dd>
			<?php echo h($mCustomer['MCustomer']['tel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail'); ?></dt>
		<dd>
			<?php echo h($mCustomer['MCustomer']['mail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Del Flag'); ?></dt>
		<dd>
			<?php echo h($mCustomer['MCustomer']['del_flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($mCustomer['MCustomer']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit M Customer'), array('action' => 'edit', $mCustomer['MCustomer']['customer_code'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete M Customer'), array('action' => 'delete', $mCustomer['MCustomer']['customer_code']), null, __('Are you sure you want to delete # %s?', $mCustomer['MCustomer']['customer_code'])); ?> </li>
		<li><?php echo $this->Html->link(__('List M Customers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New M Customer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List D Purchases'), array('controller' => 'd_purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New D Purchase'), array('controller' => 'd_purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related D Purchases'); ?></h3>
	<?php if (!empty($mCustomer['DPurchase'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('M Customer Id'); ?></th>
		<th><?php echo __('Purchase Date'); ?></th>
		<th><?php echo __('Total Price'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($mCustomer['DPurchase'] as $dPurchase): ?>
		<tr>
			<td><?php echo $dPurchase['order_id']; ?></td>
			<td><?php echo $dPurchase['m_customer_id']; ?></td>
			<td><?php echo $dPurchase['purchase_date']; ?></td>
			<td><?php echo $dPurchase['total_price']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'd_purchases', 'action' => 'view', $dPurchase['order_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'd_purchases', 'action' => 'edit', $dPurchase['order_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'd_purchases', 'action' => 'delete', $dPurchase['order_id']), null, __('Are you sure you want to delete # %s?', $dPurchase['order_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New D Purchase'), array('controller' => 'd_purchases', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
