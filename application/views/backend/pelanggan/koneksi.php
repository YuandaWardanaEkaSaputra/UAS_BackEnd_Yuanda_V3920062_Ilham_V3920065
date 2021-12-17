<?php 
 	$koneksi = mysqli_connect('localhost', 'root', '','db_sipesan');
 	if (!$koneksi) {
 		die("Koneksi dengan database gagal =  " . mysqli_connect_errno() . mysqli_connect_error());
 		
 		# code...
 	}
 ?>