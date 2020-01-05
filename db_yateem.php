<?php
if(!$connect = mysqli_connect('localhost','root','12345678')){
	echo 'Error : Can Not Connect to DataBase';
	exit;
}else{
	mysqli_select_db($connect,'yateem');
}
?>