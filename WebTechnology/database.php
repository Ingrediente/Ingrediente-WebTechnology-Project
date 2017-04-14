<?php
$connect=mysqli_connect('localhost','root','','job Application');

if(mysqli_connect_errno($connect))
{
		echo 'Failed to connect';
}

?>