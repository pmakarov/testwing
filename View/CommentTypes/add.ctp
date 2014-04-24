<div class="commentTypes form">
<?php echo $this->Form->create('CommentType'); ?>
	<fieldset>
		<legend><?php echo __('Add Comment Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Comment Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
