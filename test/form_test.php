<?php

require "../lib/Form.php";
require "../lib/Database.php";
require "../config.php";

if (isset($_REQUEST['run'])) {
	$form = new Form();
	$form	->post('name')
			->validate('minlength',2)
			
			->post('age')
			->validate('digit')
			
			->post('gender');
	
	$data = $form->get();
	$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
	$db->insert("test_person", $data);
}

?>

<form method="post" action="?run">
	<input type="text" name="name" />
	<input type="text" name="age" />
	<select name="gender">
		<option value="m">Male</option>
		<option value="f">Female</option>
	</select>
	<input type="submit" />
</form>