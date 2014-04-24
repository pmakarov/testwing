<div class="uploads form">
<?php echo $this->Form->create('Upload', array( 'type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Upload'); ?></legend>
	<?php
		echo $this->Form->input('file', array('type' => 'file','label' => 'zip'));			
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('edi_type_id', array('empty' => 'Select an EDI category'));
		//TODO: add Datepicker fields to define time window
		echo $this->Form->input('window');
		echo $this->Form->input('customer_id', array('empty' => 'Select a customer category')); 
		//echo $this->Form->input('Customer', array('type' => 'hidden'));
		//echo $this->Form->input('User' , array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Uploads'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List EdiTypes'), array('controller' => 'editypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New EdiType'), array('controller' => 'editypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
