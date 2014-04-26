<div class="dPurchases form">
<?php echo $this->Form->create('DPurchase'); ?>
	<fieldset>
		<legend><?php echo __('Add D Purchase'); ?></legend>
	<?php
		echo $this->Form->input('m_customer_id');
		echo $this->Form->input('purchase_date');
		echo $this->Form->input('total_price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List D Purchases'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List M Customers'), array('controller' => 'm_customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New M Customer'), array('controller' => 'm_customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List D Purchase Details'), array('controller' => 'd_purchase_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New D Purchase Detail'), array('controller' => 'd_purchase_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
