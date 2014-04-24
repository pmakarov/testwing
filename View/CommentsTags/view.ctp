<div class="commentsTags view">
<h2><?php echo __('Comments Tag'); ?></h2>
	<dl>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($commentsTag['Comment']['id'], array('controller' => 'comments', 'action' => 'view', $commentsTag['Comment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($commentsTag['Tag']['id'], array('controller' => 'tags', 'action' => 'view', $commentsTag['Tag']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comments Tag'), array('action' => 'edit', $commentsTag['CommentsTag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comments Tag'), array('action' => 'delete', $commentsTag['CommentsTag']['id']), null, __('Are you sure you want to delete # %s?', $commentsTag['CommentsTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comments Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
