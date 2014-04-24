<div class="batches view">
<h2><?php echo __('Batch'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($batch['Batch']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($batch['Batch']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Window'); ?></dt>
		<dd>
			<?php echo h($batch['Batch']['window']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($batch['Batch']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($batch['Batch']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($batch['Batch']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Batch'), array('action' => 'edit', $batch['Batch']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Batch'), array('action' => 'delete', $batch['Batch']['id']), null, __('Are you sure you want to delete # %s?', $batch['Batch']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batch'), array('action' => 'add')); ?> </li>
	</ul>
</div>
