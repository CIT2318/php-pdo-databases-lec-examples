<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//This is a simple example we would normally do some form validation here

//basic form processing
$id=$_POST['id'];
$lastName=$_POST['last_name'];
$firstName=$_POST['first_name'];
$email=$_POST['email'];
$msg="";

//SQL UPDATE to change a row
$query="UPDATE students SET first_name=:firstName, last_name=:lastName, email=:email WHERE id=:id";
$stmt=$conn->prepare($query);
$stmt->bindValue(':id', $id);
$stmt->bindValue(':firstName', $firstName);
$stmt->bindValue(':lastName', $lastName);
$stmt->bindValue(':email', $email);

if($stmt->execute()){
    $msg="<p>Successfully updated the details for {$firstName} {$lastName} </p>";
}else{
    $msg="<p>There was a problem inserting the data.</p>";
}

$conn=NULL;
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Update student record</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
		 <p><a href="index.php"><<< Home</a></p>
<?php
echo $msg;
?>
</body>
</html>