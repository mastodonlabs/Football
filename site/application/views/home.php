<?php echo $this->load->view('header'); ?>

<div id="content">
    <div class="container_12">
        <div class="grid_8">
        	<p>Are you ready for some football?! Think you understand the weekly matchups better than your friends and colleagues? We'll see about that. Create an account and pick who you think will win.</p>
			<p>This is week <?php echo $current_week; ?></p>
			<?php echo $schedule; ?>
			
        </div>
        <div class="grid_4">
			<h4>2011 Schedule</h4>
			<ul>
			<?php for ($w=1; $w<=17; $w++):?>	
		    	<li><?php echo anchor('week/' . $w , 'Week ' . $w); ?></li>
			<?php endfor; ?>
			</ul>
			
		    
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php echo $this->load->view('footer'); ?>
