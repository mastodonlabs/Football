<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->lang->line('website_title'); ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />
<link type="text/css" rel="stylesheet" href="/resource/css/960gs/960gs.css" />
<link type="text/css" rel="stylesheet" href="/resource/css/style.css" />
</head>
<body>
<div id="page">
	<div id="header">
		<div class="container_12">
	        <div class="grid_8">
	            <h1><?php echo anchor('', lang('website_title')); ?></h1>
				<div class="nav">
					<ul class="menu">
						<li><a href="/schedule">Schedule</a></li>
						<li><a href="/user/picks/awoods">My Picks</a></li>
					</ul>	
				</div>	
	        </div>
	        <div class="grid_4">
				<div class="nav">
	            <ul id="top_menu" class="menu">
	                <?php if ($this->authentication->is_signed_in()) : ?>
	                <li><?php if (isset($account)) echo sprintf(lang('welcome_username'), '<strong>'.$account->username.'</strong>'); ?></li>
	                <li><?php echo anchor('account/account_settings', lang('account')); ?></li>
	                <li><?php echo anchor('account/account_profile', lang('profile')); ?></li>
	                <li><?php echo anchor('account/sign_out', lang('sign_out')); ?></li>
	                <?php else : ?>
	                <li><?php echo anchor('account/sign_up', lang('sign_up')); ?></li>
	                <li><?php echo anchor('account/sign_in', lang('sign_in')); ?></li>
	                <?php endif; ?>
	            </ul>
				</div>
	        </div>
	        <div class="clear"></div>
	    </div> <!-- /.container_12 -->
	</div> <!-- /#header -->