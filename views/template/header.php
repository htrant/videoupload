<?php Session::init(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Insert title here</title>
	
	<link href="<?php echo URL;?>public/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<link href="<?php echo URL;?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URL;?>public/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script src="<?php echo URL;?>public/js/flowplayer-3.2.13.min.js" type="text/javascript"></script>
	<?php 
		if (isset($this->js)) {
			foreach ($this->js as $js) {
				echo "<script src='" . URL. "views/" .$js. "' type='text/javascript'></script>";
			}
		}
	?>
</head>

<body class="body">

<div id="header">
	<h1>PAGE HEADER</h1>
	<ul>
		<?php if (Session::get('loggedIn') == false) { ?>
			<li><a href="<?php echo URL;?>index">Home</a></li>
			<li><a href='<?php echo URL;?>login'>Login</a></li>			
			<li><a href="<?php echo URL;?>help">Help</a></li>
		<?php } else { ?>
			<li><a href='<?php echo URL;?>dashboard'>Dashboard</a></li>
			<li><a href='<?php echo URL;?>note'>Notes</a></li>
			<li><a href='<?php echo URL;?>video'>Videos</a></li>
			<li><a href='<?php echo URL;?>upload'>Upload Files</a></li>
			<?php if (Session::get('role') == 'owner'):?>
			<li><a href='<?php echo URL;?>user'>Users</a></li>
		<?php endif;?>
			<li><a href='<?php echo URL;?>dashboard/logout'>Logout</a></li> 
		<?php }?>
	</ul>
</div>

<div id="content">
