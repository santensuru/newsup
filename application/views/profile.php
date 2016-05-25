<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?=$error?>

<?php echo form_open('profile/set'); ?>

	<label for="name">Nama Lengkap</label>
	<input type="input" name="name" /><br />

	<input type="submit" name="submit" value="Perbaharui" />

</form>