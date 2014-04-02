
<div class="row-fluid">
	<div class="span2">
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="nav nav-tabs nav-stacked">
				<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?></li>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	<div class="span10">
		<div class="critterWell">
			<h2><?php echo __('Groups'); ?></h2>
			<table class="table table-striped table-condensed">
			<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>
					<th><?php echo $this->Paginator->sort('created'); ?></th>
					<th><?php echo $this->Paginator->sort('modified'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($groups as $group): ?>
			<tr>
				<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
				<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
				<td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
				<td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $group['Group']['id']),array('class' => 'btn btn-small')); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id']),array('class' => 'btn btn-small')); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), array('class' => 'btn btn-small'), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
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
		</div> <!-- end span -->
</div><!-- end row -->

