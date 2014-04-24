<div class="transactionRejectionTypes view">
<h2><?php echo __('Transaction Rejection Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transactionRejectionType['TransactionRejectionType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($transactionRejectionType['TransactionRejectionType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transaction Rejection Type'), array('action' => 'edit', $transactionRejectionType['TransactionRejectionType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transaction Rejection Type'), array('action' => 'delete', $transactionRejectionType['TransactionRejectionType']['id']), null, __('Are you sure you want to delete # %s?', $transactionRejectionType['TransactionRejectionType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Rejection Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Rejection Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
