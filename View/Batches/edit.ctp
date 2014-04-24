<div class="batches form">
<?php echo $this->Form->create('Batch'); ?>
	<fieldset>
		<legend><?php echo __('Edit Batch'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('window');
		echo $this->Form->input('path');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Batch.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Batch.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Batches'), array('action' => 'index')); ?></li>
	</ul>
</div>
