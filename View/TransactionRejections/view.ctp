<div class="transactionRejections view">
<h2><?php echo __('Transaction Rejection'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transactionRejection['TransactionRejection']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transactionRejection['Transaction']['name'], array('controller' => 'transactions', 'action' => 'view', $transactionRejection['Transaction']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Rejection Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transactionRejection['TransactionRejectionType']['name'], array('controller' => 'transaction_rejection_types', 'action' => 'view', $transactionRejection['TransactionRejectionType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($transactionRejection['TransactionRejection']['text']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transaction Rejection'), array('action' => 'edit', $transactionRejection['TransactionRejection']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transaction Rejection'), array('action' => 'delete', $transactionRejection['TransactionRejection']['id']), null, __('Are you sure you want to delete # %s?', $transactionRejection['TransactionRejection']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Rejections'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Rejection'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Rejection Types'), array('controller' => 'transaction_rejection_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Rejection Type'), array('controller' => 'transaction_rejection_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
