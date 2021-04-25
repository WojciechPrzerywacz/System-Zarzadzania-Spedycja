<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'wojtek', 'haslo123', 'Firma_Transportowa');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>