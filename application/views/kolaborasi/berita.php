<?php
defined('BASEPATH') OR exit('No direct script access allowed');

foreach($berita as $row) {
	if ($main)
	{
		echo '<a href="'.base_url().'berita/index/'.$row['NEWS_ID'].'"> ';
	}
	print_r($row); echo "<br/>";
	if ($main)
	{
		echo ' </a><br/>';
	}
	echo '<a href="'.base_url().'berita/command/'.$row['NEWS_ID'].'"> Bagikan Komentar </a><br/>';
}
?>

<?=$paginasi?>

<?php if (!$main)
	{
		echo '<a href="'.base_url().'berita/create/'.$news_id.'"> Lanjutin </a>';
	}
?>