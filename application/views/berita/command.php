<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?=$error?>

<?php echo form_open('berita/command'); ?>
	
	<input type="hidden" name="parent_id" value=<?=$parent_id?> /><br />
	<input type="hidden" name="news_id" value=<?=$news_id?> /><br />

	<label for="header">Judul</label>
	<input type="input" name="header" value=<?=$header?> /><br />

	<label for="sub_header">Sub Judul</label>
	<input type="input" name="sub_header" value=<?=$sub_header?> /><br />

	<label for="command">Komentar</label>
	<input type="input" name="command" /><br />

	<input type="submit" name="submit" value="Bagikan" />

</form>