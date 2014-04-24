<div class="ediTypes view">
<h2><?php echo __('Edi Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ediType['EdiType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($ediType['EdiType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Edi Type'), array('action' => 'edit', $ediType['EdiType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Edi Type'), array('action' => 'delete', $ediType['EdiType']['id']), null, __('Are you sure you want to delete # %s?', $ediType['EdiType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Edi Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Edi Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Uploads'); ?></h3>
	<?php if (!empty($ediType['Upload'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Window'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Edi Type Id'); ?></th>
		<th><?php echo __('Filepath'); ?></th>
		<th><?php echo __('Filename'); ?></th>
		<th><?php echo __('Filesize'); ?></th>
		<th><?php echo __('Filemime'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ediType['Upload'] as $upload): ?>
		<tr>
			<td><?php echo $upload['id']; ?></td>
			<td><?php echo $upload['user_id']; ?></td>
			<td><?php echo $upload['title']; ?></td>
			<td><?php echo $upload['description']; ?></td>
			<td><?php echo $upload['window']; ?></td>
			<td><?php echo $upload['customer_id']; ?></td>
			<td><?php echo $upload['edi_type_id']; ?></td>
			<td><?php echo $upload['filepath']; ?></td>
			<td><?php echo $upload['filename']; ?></td>
			<td><?php echo $upload['filesize']; ?></td>
			<td><?php echo $upload['filemime']; ?></td>
			<td><?php echo $upload['created']; ?></td>
			<td><?php echo $upload['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'uploads', 'action' => 'view', $upload['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'uploads', 'action' => 'edit', $upload['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'uploads', 'action' => 'delete', $upload['id']), null, __('Are you sure you want to delete # %s?', $upload['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
