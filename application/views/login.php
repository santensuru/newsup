<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?=$error?>

<?php echo form_open('home/login'); ?>

	<label for="username">Username</label>
	<input type="input" name="username" /><br />

	<label for="password">Password</label>
	<input type="password" name="password" /><br />

	<input type="submit" name="submit" value="Masuk" />

</form>