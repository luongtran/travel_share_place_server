<div class="placeComments view">
<h2><?php echo __('Place Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($placeComment['PlaceComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Messege'); ?></dt>
		<dd>
			<?php echo h($placeComment['PlaceComment']['messege']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Id'); ?></dt>
		<dd>
			<?php echo h($placeComment['PlaceComment']['place_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($placeComment['PlaceComment']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment Time'); ?></dt>
		<dd>
			<?php echo h($placeComment['PlaceComment']['comment_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Place Comment'), array('action' => 'edit', $placeComment['PlaceComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Place Comment'), array('action' => 'delete', $placeComment['PlaceComment']['id']), null, __('Are you sure you want to delete # %s?', $placeComment['PlaceComment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Comment'), array('action' => 'add')); ?> </li>
	</ul>
</div>
