<?php
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
		if($pwd!=$repwd)
		{
			echo("Password did not match!");
		}
		else
		{
			$d=$uname.";".$pwd."\n";
			$file=fopen($fname,"a");
			//fseek($file,0,SEEK_END);
			fwrite($file,$d);
			echo("Successfully registered!");
		}
	}
	else
	{
		echo("Username already exists");
	}
	
	
?>