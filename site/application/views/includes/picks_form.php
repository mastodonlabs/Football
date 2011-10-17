<?php if (isset($games)): ?>
	<?php echo form_open($form_path); ?>
	<table summary="the rows are the games for week <?php echo $week; ?>. ">
		<tr>
			<th id="away">Away</th>
			<th id="home">Home</th>
			<th id="time">Game Time (EST)</th>
		</tr>
		<?php
		$even = 0;
		foreach ($games AS $game): 
			$row_class = ($even) ? 'even' : 'odd'; 
		?>	
		<tr class="<?php echo $row_class;?>">
			<td headers="away"><?php echo form_radio('game_id_' . $game->id, $game->away, 
			                               set_radio('game_id_' . $game->id, $game->away)); echo $game->away; ?></td>
			<td headers="home"><?php echo form_radio('game_id_' . $game->id, $game->home, 
			                               set_radio('game_id_' . $game->id, $game->home)); echo $game->home; ?></td>
			<td headers="time"><?php echo strftime("%b %e (%a), %l:%M %p", $game->game_time_unix); ?></td>
		</tr>	
		<?php 
		$even ^= 1;
		endforeach; ?>

	</table>
	<?php echo form_submit('submit_button', 'Submit'); ?>
	<?php echo form_close(); ?>	
<?php endif; ?>
