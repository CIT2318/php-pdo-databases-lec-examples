<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}


//This is a simple example we would normally do some form validation here

//basic form processing
$lastName=$_POST['last_name'];
$firstName=$_POST['first_name'];
$email=$_POST['email'];
$msg="";

//SQL INSERT for adding a new row
//Use a prepared statement to bind the values from the form
$query="INSERT INTO students (id, first_name, last_name, email) VALUES (NULL, :firstName, :lastName, :email)";
$stmt=$conn->prepare($query);
$stmt->bindValue(':firstName', $firstName);
$stmt->bindValue(':lastName', $lastName);
$stmt->bindValue(':email', $email);

//when we execute the SQL statement the number of affected rows is returned
$affected_rows = $stmt->execute();

if($affected_rows==1){
    $msg="<p>Successfully added the details for ".$firstName." ".$lastName."</p>";
}else{
    $msg="<p>There was a problem inserting the data.</p>";
}
$conn=NULL;
?>


<!DOCTYPE HTML>
<html>
<head>
<title>List the films</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php
echo $msg;
?>
</body>
</html>