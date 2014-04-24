<div class="batches form">
<?php echo $this->Form->create('Batch', array( 'type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Batch'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('window');
		//echo $this->Form->input('path');
		echo $this->Form->input('path', array('type' => 'file','label' => 'zip')); 
	?>
	</fieldset>
<?php  //echo $this->Form->end(__('Submit')); 
echo $this->Form->end('Upload file');
?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Batches'), array('action' => 'index')); ?></li>
	</ul>
</div>
