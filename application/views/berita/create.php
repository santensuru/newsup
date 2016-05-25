<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?=$error?>

<?php echo form_open('berita/create'); ?>
	
	<input type="hidden" name="parent_id" value=<?=$parent_id?> /><br />

	<label for="header">Judul</label>
	<input type="input" name="header" value=<?=$header?> /><br />

	<label for="sub_header">Sub Judul</label>
	<input type="input" name="sub_header" /><br />

	<label for="news">Berita</label>
	<input type="input" name="news" /><br />

	<label for="fileGambar">Gambar</label>
	<input type="file" name="fileGambar" /><br />

	<label for="category">Kategory</label>
	<select name="category">
		<?php foreach ($category as $row) {
			echo '<option value='.$row['CATEGORY_ID'].'>'.$row['CATEGORY_NAME'].'</option>';
		}?>
	</select>
	<br />

	<input type="submit" name="submit" value="Bagikan" />

</form>