<h2>Welcome</h2>

<form id="randomInsert" action="<?php echo URL;?>dashboard/xhrInsert" method="post">
	<fieldset>
		<legend>Enter your text</legend>
		<div class="form-group">
				<label for="text">Your text</label>
				<input type="text" class="form-control myInput" name="text" />
		</div>	
		<button class="btn"  type="submit">Insert Text</button>
	</fieldset>
</form>

<br/>

<div id="listInserts">

</div>