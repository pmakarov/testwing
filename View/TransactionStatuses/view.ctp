<div class="transactionStatuses view">
<h2><?php echo __('Transaction Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transactionStatus['TransactionStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($transactionStatus['TransactionStatus']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transaction Status'), array('action' => 'edit', $transactionStatus['TransactionStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transaction Status'), array('action' => 'delete', $transactionStatus['TransactionStatus']['id']), null, __('Are you sure you want to delete # %s?', $transactionStatus['TransactionStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transactions'); ?></h3>
	<?php if (!empty($transactionStatus['Transaction'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Upload Id'); ?></th>
		<th><?php echo __('Xmlfile'); ?></th>
		<th><?php echo __('Edifile'); ?></th>
		<th><?php echo __('Udffile'); ?></th>
		<th><?php echo __('Transaction Status Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transactionStatus['Transaction'] as $transaction): ?>
		<tr>
			<td><?php echo $transaction['id']; ?></td>
			<td><?php echo $transaction['upload_id']; ?></td>
			<td><?php echo $transaction['xmlfile']; ?></td>
			<td><?php echo $transaction['edifile']; ?></td>
			<td><?php echo $transaction['udffile']; ?></td>
			<td><?php echo $transaction['transaction_status_id']; ?></td>
			<td><?php echo $transaction['created']; ?></td>
			<td><?php echo $transaction['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transactions', 'action' => 'view', $transaction['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transactions', 'action' => 'edit', $transaction['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transactions', 'action' => 'delete', $transaction['id']), null, __('Are you sure you want to delete # %s?', $transaction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
