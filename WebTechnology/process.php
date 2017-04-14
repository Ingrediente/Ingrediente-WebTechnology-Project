<?php include 'database.php'; ?>
	
<?php
$conn = new mysqli('localhost','root','','job Application');

	extract($_GET);
	$sql = "CREATE TABLE user (
uname VARCHAR(30) PRIMARY KEY, 
pwd VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    #echo "Error creating table: " . $conn->error;
}
$sql = "INSERT INTO user (uname, pwd)
VALUES ('$uname','$pwd')";
if($pwd!=$repwd)
{
	echo("Password did not match!");
}
else
{
if ($conn->query($sql) === TRUE) {
    echo("Successfully registered!");
} else {
    echo("Username already exists");
}
}
?>