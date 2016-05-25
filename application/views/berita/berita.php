<?php
defined('BASEPATH') OR exit('No direct script access allowed');

foreach($berita as $row) {
	print_r($row); echo "<br/>";
	echo '<a href="'.base_url().'berita/question/'.$row['NEWS_ID'].'"> Tambahkan Pertanyaan </a><br/>';
	echo '<a href="'.base_url().'berita/command/'.$row['NEWS_ID'].'"> Bagikan Komentar </a><br/>';
}
?>

<?=$paginasi?>

<?php if (!$main)
	{
		echo '<a href="'.base_url().'berita/create/'.$news_id.'"> Tambahkan Berita Terkait </a>';
	}
?>