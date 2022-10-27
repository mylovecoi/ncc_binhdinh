<?php
	//$con = mysql_connect("localhost","nhngubq7_bg","appdung2003") or die//("Không thể kết nối đến csdl");
		//mysql_query("set names 'utf8'");
		//mysql_select_db("nhngubq7_bg") or die("Không thể chọn csdl");
		$con = mysqli_connect("localhost","root","","ncc_binhdinh") or die("Khong the ket noi csdl");
        mysqli_query($con,"set names 'utf8'");
?>