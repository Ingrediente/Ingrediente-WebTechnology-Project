<?php
	session_start();
	extract($_GET);
	$fname="users.txt";
	$file=fopen($fname,"r");
	$data=fread($file,filesize($fname));
	trim($data);
	$line=explode("\n",$data);
	$i=0;
	$f=0;
	while($line[$i])
	{	
		$arr=explode(";",$line[$i++]);
		if($arr[0]==$uname)
		{
			$f=1;
			break;
		}
	}
	fclose($file);
	if($f==0)
	{
		$d=$uname.";".$pwd."\n";
		$file=fopen($fname,"r");
		$fseek($file,0,SEEK_END);
		$fwrite($file,$d);
		echo("Successfully registered!");
	}
	else
	{
		echo("Username already exists");
	}
	
	
?>