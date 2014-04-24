<div class="transactionRejections form">
<?php echo $this->Form->create('TransactionRejection'); ?>
	<fieldset>
		<legend><?php echo __('Edit Transaction Rejection'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('transaction_id');
		echo $this->Form->input('transaction_rejection_type_id');
		echo $this->Form->input('text');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TransactionRejection.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TransactionRejection.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transaction Rejections'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Rejection Types'), array('controller' => 'transaction_rejection_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Rejection Type'), array('controller' => 'transaction_rejection_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
