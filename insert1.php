<?php
//attempt database connection assuming you are running mysql server with the settings for user as "root" and password as "Brian1234" NOTE: if you dont have a passwrd then leave the password section blank.
//my database is called "brian " and my table is called  "persons"
$link = mysqli_connect("localhost","root","Brian1234", "brian");
//check connection
if($link === false){
	die("Error: Could not connect.".mysqli_connect_error());
} 
//escape user inputs for security
/* The mysqli_real_escape_string() function escapes special characters in a string and create a legal SQL string to provide security against SQL injection.*/
$first_name = mysqli_real_escape_string($link, $_REQUEST ['first_name']) ;
$last_name = mysqli_real_escape_string($link, $_REQUEST ['last_name']) ;

$email = mysqli_real_escape_string($link, $_REQUEST ['email']) ;

//Insert query execution
$sql = "insert into persons(first_name, last_name, email)
VALUES('$first_name', '$last_name', '$email')";
if(mysqli_query($link, $sql)){
	echo "Records added successfully.";
}else{
	echo "Could not add records $sql.".mysqli_error();
}
//close connection
mysqli_close($link);

?>