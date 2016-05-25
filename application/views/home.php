<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
if ($is_login) {
	?>
		<a href="<?php echo base_url(); ?>home/logout"> Keluar </a>
	<?php
}
else
{
	?>
		<a href="<?php echo base_url(); ?>home/register"> Daftar </a>
		<br/>
		<a href="<?php echo base_url(); ?>home/login"> Masuk </a>
	<?php
}
?>

<br/>
<a href="<?php echo base_url(); ?>aspirasi"> Jalin Aspirasi </a>