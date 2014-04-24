<div class="commentTypes view">
<h2><?php echo __('Comment Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($commentType['CommentType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($commentType['CommentType']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comment Type'), array('action' => 'edit', $commentType['CommentType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comment Type'), array('action' => 'delete', $commentType['CommentType']['id']), null, __('Are you sure you want to delete # %s?', $commentType['CommentType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comment Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
