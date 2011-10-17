<?php if (isset($games)): ?>
	<table>
		<tr>
			<th>Away</th>
			<th>Home</th>
			<th>Game Time (EST)</th>
		</tr>
		<?php
		$even = 0;
		foreach ($games AS $game): 
			$row_class = ($even) ? 'even' : 'odd'; 
		?>	
		<tr class="<?php echo $row_class;?>">
			<td><?php echo $game->away; ?></td>
			<td><?php echo $game->home; ?></td>
			<td><?php echo strftime("%b %e (%a), %l:%M %p", $game->game_time_unix); ?></td>
		</tr>	
		<?php 
		$even ^= 1;
		endforeach; ?>

	</table>	
<?php endif; ?>
