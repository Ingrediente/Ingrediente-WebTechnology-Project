<?php
	session_start();
	$_SESSION["uname"]=null;
	$_SESSION["loggedin"]="false";
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
			$string = chop($arr[1]);
			if(strcmp($string,$pwd)==0)
			{
				$f=1;
				$_SESSION["uname"]=$uname;
				$_SESSION["loggedin"]="true";
				//echo "parent.obj.x='true'";
				//echo "alert(parent.obj.x)"
				
				break;
			}
			else
			{
				$f=2;
				break;
			}
		}
	}
	if($f==0)
	{
		echo("Username not found!");
	}
	else if($f==1)
	{
		echo("Successfully logged in!");
	}
	else
	{
		echo("Password in-correct");
	}
	
	
?>
