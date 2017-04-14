
<?php 
	require  'medoo.php';
	// Using Medoo namespace
	use Medoo\Medoo;
	$database = new Medoo([
		// required
		'database_type' => 'mysql',
		'database_name' => 'job Application',
		'server' => 'localhost',
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8'
	]);
	
	$datas = $database->select("user", [
		"uname",
		"pwd"
	], [
		"uname" => $_GET['uname']
	]);
	if( $datas[0]['pwd'] ==  $_GET['pwd']){
		echo("Successfully logged in!");
		//header('Location: '. 'template.php');
	}else{
		echo "Login Failed!";		
		//header('Location: '. 'login.php');
		
	}
?>
