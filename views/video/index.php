<h2>List of Videos</h2>
<table class="table" style="margin-top:30px;" >
	<tr>
		<th>Title</th>
		<th>Uploaded</th>
		<th>Video</th>
	</tr>
	
	<?php	
	foreach ( $this->videoList as $key=>$value ) {		
		$thumb = URL . "public/images/smiley.gif";
		$singleVideo = URL . "video/watch/" . $value['fileid'];
		echo "<tr>";
			echo "<td>" . $value ['file_title'] . "</td>";
			echo "<td>" . $value ['date_added'] . "</td>";
			echo "<td> 
					<a href='" .$singleVideo. "'> 
						<img src='" .$thumb. "' alt='smiley'> 
					</a> 
				  </td>";
		echo "</tr>";
	}
	?>	
</table>