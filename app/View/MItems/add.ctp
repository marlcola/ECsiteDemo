<div class="mItems form">
<?php echo $this->Form->create('MItem'); ?>
	<fieldset>
		<legend><?php echo __('Add M Item'); ?></legend>
	<?php
		echo $this->Form->input('item_name');
		echo $this->Form->input('price');
		echo $this->Form->input('category');
		echo $this->Form->input('image');
		echo $this->Form->input('detail');
		echo $this->Form->input('del_flag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List M Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List D Purchase Details'), array('controller' => 'd_purchase_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New D Purchase Detail'), array('controller' => 'd_purchase_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
