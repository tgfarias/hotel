<?php

	if(isset($_GET)){
		echo $this->input->is_ajax_request();
		echo "<script> alert('Fodeo'); </script>";
	}
?>