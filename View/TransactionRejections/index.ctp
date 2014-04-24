<div class="transactionRejections index">
	<h2><?php echo __('Transaction Rejections'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transaction_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transaction_rejection_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('text'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transactionRejections as $transactionRejection): ?>
	<tr>
		<td><?php echo h($transactionRejection['TransactionRejection']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transactionRejection['Transaction']['name'], array('controller' => 'transactions', 'action' => 'view', $transactionRejection['Transaction']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transactionRejection['TransactionRejectionType']['name'], array('controller' => 'transaction_rejection_types', 'action' => 'view', $transactionRejection['TransactionRejectionType']['id'])); ?>
		</td>
		<td><?php echo h($transactionRejection['TransactionRejection']['text']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transactionRejection['TransactionRejection']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transactionRejection['TransactionRejection']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transactionRejection['TransactionRejection']['id']), null, __('Are you sure you want to delete # %s?', $transactionRejection['TransactionRejection']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transaction Rejection'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Rejection Types'), array('controller' => 'transaction_rejection_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Rejection Type'), array('controller' => 'transaction_rejection_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
