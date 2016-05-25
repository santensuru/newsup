<?php
defined('BASEPATH') OR exit('No direct script access allowed');

foreach($aspirasi as $row) {
	print_r($row); echo "<br/>";
}
?>

<?php echo form_open('aspirasi/create'); ?>

	<label for="aspirasi">Aspirasi</label>
	<input type="input" name="aspirasi" /><br />

	<input type="submit" name="submit" value="Bagikan" />

</form>

<?=$paginasi?>