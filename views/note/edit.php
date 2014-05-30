<h1>Edit Note</h1>

<form role="form" method="post" action="<?php echo URL;?>note/editSave/<?php echo $this->note[0]['noteid'];?>">
	<fieldset>
		<legend>New information</legend>
		<div class="form-group">
			<label for="title">Title</label> 
			<input class="form-control myInput" value="<?php echo $this->note[0]['title'];?>" name="title" />
		</div>
		<div class="form-group">
			<label for="content">Content</label>
			<textarea class="form-control myInput" rows="5" name="content"><?php echo $this->note[0]['content'];?></textarea>
		</div>
		<button class="btn" type="submit">Save Changes</button>
	</fieldset>
</form>