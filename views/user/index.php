<h2>User Dashboard</h2>

<form action="user/create" method="post" role="form">
	<fieldset>
		<legend>Add new user</legend>
		<div class="form-group">
			<label for="email">Email</label> 
			<input type="email" class="form-control myInput" placeholder="Please enter email" name="email" />
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="text" class="form-control myInput" placeholder="Please enter password" name="password" />
		</div>
		<div class="form-group">
			<label for="role">Role</label>
			<select class="form-control myInput" name="role">
				<option value="default">Default</option>
				<option value="admin">Admin</option>
				<option value="owner">Owner</option>
			</select>
		</div>
		<button class="btn" type="submit">Add User</button>
	</fieldset>	
</form>

<table class="table">
	<tr>
		<th>ID</th>
		<th>Email</th>
		<th>Role</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
<?php
foreach ( $this->user as $value ) {
	echo "<tr>";
	echo "<td>" . $value ['userid'] . "</td>";
	echo "<td>" . $value ['email'] . "</td>";
	echo "<td>" . $value ['role'] . "</td>";
	echo "<td> <a href='" .URL. "user/edit/" .$value['userid']. "'>Edit</a> </td>";
	echo "<td> <a href='" .URL. "user/delete/" .$value['userid']. "'>Delete</a> </td>";	
	echo "</tr>";
}
?>

</table>