<h1>Edit User</h1>
<form role="form" method="post" action="<?php echo URL;?>user/editSave/<?php echo $this->user[0]['userid'];?>">
	<fieldset>
		<legend>New information</legend>
		<div class="form-group">
			<label for="email">Email</label> 
			<input type="email" class="form-control myInput" value="<?php echo $this->user[0]['email'];?>" name="email" />
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="text" class="form-control myInput" name="password" />
		</div>
		<div class="form-group">
			<label for="role">Role</label>
			<select class="form-control myInput" name="role">
				<option value="default" <?php if($this->user[0]['role']=="default") echo "selected";?>>Default</option>
				<option value="admin" <?php if($this->user[0]['role']=="admin") echo "selected";?>>Admin</option>
				<option value="owner" <?php if($this->user[0]['role']=="owner") echo "selected";?>>Owner</option>
			</select>
		</div>
		<button class="btn" type="submit">Save Changes</button>
	</fieldset>
</form>