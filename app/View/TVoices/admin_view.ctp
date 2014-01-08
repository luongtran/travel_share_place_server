<div class="tVoices view">
<h2><?php echo __('T Voice'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tVoice['TVoice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('V Name'); ?></dt>
		<dd>
			<?php echo h($tVoice['TVoice']['v_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit T Voice'), array('action' => 'edit', $tVoice['TVoice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete T Voice'), array('action' => 'delete', $tVoice['TVoice']['id']), null, __('Are you sure you want to delete # %s?', $tVoice['TVoice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List T Voices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New T Voice'), array('action' => 'add')); ?> </li>
	</ul>
</div>
