<div class="mCustomers index">
	<h2><?php echo __('M Customers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('customer_code'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_name'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('tel'); ?></th>
			<th><?php echo $this->Paginator->sort('mail'); ?></th>
			<th><?php echo $this->Paginator->sort('del_flag'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($mCustomers as $mCustomer): ?>
	<tr>
		<td><?php echo h($mCustomer['MCustomer']['customer_code']); ?>&nbsp;</td>
		<td><?php echo h($mCustomer['MCustomer']['customer_name']); ?>&nbsp;</td>
		<td><?php echo h($mCustomer['MCustomer']['password']); ?>&nbsp;</td>
		<td><?php echo h($mCustomer['MCustomer']['name']); ?>&nbsp;</td>
		<td><?php echo h($mCustomer['MCustomer']['address']); ?>&nbsp;</td>
		<td><?php echo h($mCustomer['MCustomer']['tel']); ?>&nbsp;</td>
		<td><?php echo h($mCustomer['MCustomer']['mail']); ?>&nbsp;</td>
		<td><?php echo h($mCustomer['MCustomer']['del_flag']); ?>&nbsp;</td>
		<td><?php echo h($mCustomer['MCustomer']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mCustomer['MCustomer']['customer_code'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mCustomer['MCustomer']['customer_code'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mCustomer['MCustomer']['customer_code']), null, __('Are you sure you want to delete # %s?', $mCustomer['MCustomer']['customer_code'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New M Customer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List D Purchases'), array('controller' => 'd_purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New D Purchase'), array('controller' => 'd_purchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
