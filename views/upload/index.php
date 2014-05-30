<form role="form" action="upload/doUpload" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>Video File Upload</legend>
		<div class="form-group">
			<label for="filetitle">File title</label>
			<input type="text" name="filetitle"  class="form-control myInput" placeholder="Please enter title" />
		</div>
		<div class="form-group">
			<label for="filedes">File description</label>
			<input type="text" class="form-control myInput" placeholder="Please enter description" name="filedes" />
		</div>
		<div class="form-group">
			<label for="file">File</label>
			<input name="MAX_FILE_SIZE" value="100000000" type="hidden" />
			<input type="file" name="file" accept="video/*" />
			<p class="help-block">Max size: 750 Mb</p>
		</div>
		<button class="btn" type="submit">Upload File</button>
	</fieldset>
</form>