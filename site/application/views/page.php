<?php echo $this->load->view('header'); ?>

<div id="content">
    <div class="container_12">
        <div class="grid_8">
			<?php echo $content; ?>			
        </div>
        <div class="grid_4 sidebar">
		    <?php 
				if ( isset($sidebar) && $sidebar ): 
					echo $sidebar; 
				else: ?>
				<div>
					<strong>Default Sidebar</strong>
				</div>
			<?php endif; ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php echo $this->load->view('footer'); ?>

