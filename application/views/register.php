<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?=$error?>

<?php echo form_open('home/register'); ?>

	<label for="username">Username</label>
	<input type="input" name="username" /><br />

	<label for="email">Email</label>
	<input type="input" name="email" /><br />

	<label for="password">Password</label>
	<input type="password" name="password" /><br />

	<label for="confirmation">Re-Password</label>
	<input type="password" name="confirmation" /><br />

	<input type="radio" name="status" value="0" checked> Sumber </input>
	<input type="radio" name="status" value="1"> Jurnalis </input>

	<br/>

	<input type="submit" name="submit" value="Daftar" />

</form>