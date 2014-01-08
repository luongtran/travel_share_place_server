<div class="placeFavorites form">
<?php echo $this->Form->create('PlaceFavorite'); ?>
	<fieldset>
		<legend><?php echo __('Add Place Favorite'); ?></legend>
	<?php
		echo $this->Form->input('place_id');
		echo $this->Form->input('place_fav_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Place Favorites'), array('action' => 'index')); ?></li>
	</ul>
</div>
