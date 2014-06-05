<h2 style="margin-bottom:10px;"> <?php echo $this->video[0]['file_title'];?> </h2>

<?php 
	$filepath = FILEURL . $this->video[0]['file_on_server'];
	//echo $filepath;
?>

<table>
	<tr>
		<td><b>Description:</b>&nbsp;&nbsp;</td>
		<td><?php echo $this->video[0]['file_des'];?></td>
	<tr>
	<tr>
		<td><b>Uploaded:</b>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo $this->video[0]['date_added'];?></td>
	<tr>
</table>


<div id="playvideo">
	<a href="<?php echo $filepath;?>" id="player"></a>	
</div>


<script language="JavaScript">	

	$f("player", "<?php echo URL;?>public/swf/flowplayer-3.2.18.swf", {
		 
	    'clip' : {
	    	autoPlay: false,
			autoBuffering: true
	    }
	});

	
</script>
