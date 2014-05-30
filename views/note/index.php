<h2>User Note</h2>

<form action="note/create" method="post" role="form">
	<fieldset>
		<legend>Add new note</legend>
		<div class="form-group">
			<label for="title">Title</label> 
			<input class="form-control myInput" placeholder="Please enter title" name="title" />
		</div>
		<div class="form-group">
			<label for="content">Content</label>
			<textarea class="form-control myInput" rows="5" name="content"></textarea>
		</div>
		<button class="btn" type="submit">Add Note</button>
	</fieldset>	
</form>

<table class="table">
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Content</th>
		<th>Date Added</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	
<?php

foreach ( $this->noteList as $key => $value ) {
	echo "<tr>";
	echo "<td>" . $value ['noteid'] . "</td>";
	echo "<td>" . $value ['title'] . "</td>";
	echo "<td>" . $value ['content'] . "</td>";
	echo "<td>" . $value ['date_added'] . "</td>";
	echo "<td> <a href='" .URL. "note/edit/" .$value['noteid']. "'>Edit</a> </td>";
	echo "<td> <a class='delete' href='" .URL. "note/delete/" .$value['noteid']. "'>Delete</a> </td>";	
	echo "</tr>";
}
?>

</table>

<script>
$(function() {
	$('.delete').click(function(e){
		var c = confirm("Are you sure?");
		if (c == false) return false;		
	});	
});
</script>