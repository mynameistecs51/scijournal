<?php echo $header;?>
<?php $this->load->view('reviewer/head_menu');?>
<?php
	foreach ($read_journal as $read) {
		echo "journal title:",$read['j_title'],"<br/>";
	}
 ?>
<?php echo $footer;?>