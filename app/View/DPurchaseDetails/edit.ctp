<div class="dPurchaseDetails form">
<?php echo $this->Form->create('DPurchaseDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit D Purchase Detail'); ?></legend>
	<?php
		echo $this->Form->input('detail_id');
		echo $this->Form->input('d_purchase_id');
		echo $this->Form->input('m_item_id');
		echo $this->Form->input('price');
		echo $this->Form->input('num');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DPurchaseDetail.detail_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DPurchaseDetail.detail_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List D Purchase Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List D Purchases'), array('controller' => 'd_purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New D Purchase'), array('controller' => 'd_purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List M Items'), array('controller' => 'm_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New M Item'), array('controller' => 'm_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
