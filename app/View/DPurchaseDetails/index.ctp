<div class="dPurchaseDetails index">
	<h2><?php echo __('D Purchase Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('detail_id'); ?></th>
			<th><?php echo $this->Paginator->sort('d_purchase_id'); ?></th>
			<th><?php echo $this->Paginator->sort('m_item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('num'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dPurchaseDetails as $dPurchaseDetail): ?>
	<tr>
		<td><?php echo h($dPurchaseDetail['DPurchaseDetail']['detail_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dPurchaseDetail['DPurchase']['order_id'], array('controller' => 'd_purchases', 'action' => 'view', $dPurchaseDetail['DPurchase']['order_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($dPurchaseDetail['MItem']['item_code'], array('controller' => 'm_items', 'action' => 'view', $dPurchaseDetail['MItem']['item_code'])); ?>
		</td>
		<td><?php echo h($dPurchaseDetail['DPurchaseDetail']['price']); ?>&nbsp;</td>
		<td><?php echo h($dPurchaseDetail['DPurchaseDetail']['num']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dPurchaseDetail['DPurchaseDetail']['detail_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dPurchaseDetail['DPurchaseDetail']['detail_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dPurchaseDetail['DPurchaseDetail']['detail_id']), null, __('Are you sure you want to delete # %s?', $dPurchaseDetail['DPurchaseDetail']['detail_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New D Purchase Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List D Purchases'), array('controller' => 'd_purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New D Purchase'), array('controller' => 'd_purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List M Items'), array('controller' => 'm_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New M Item'), array('controller' => 'm_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
