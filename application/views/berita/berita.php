<?php
defined('BASEPATH') OR exit('No direct script access allowed');

foreach($berita as $row) {
	print_r($row); echo "<br/>";
}
?>

<?=$paginasi?>

<?php if (!$main)
	{
		echo '<a href="'.base_url().'berita/create/'.$news_id.'"> Tambahkan Berita Terkait </a>';
	}
?>