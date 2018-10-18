<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
//the id from the query string e.g. details.php?id=4
$studentId=$_GET['id']; 

//prepared statement uses the id to select a single student
$stmt = $conn->prepare("SELECT * FROM students WHERE students.id = :id");
$stmt->bindValue(':id',$studentId);
$stmt->execute();
$student=$stmt->fetch();
$conn=NULL;


?>


<!DOCTYPE HTML>
<html>
<head>
<title>Display the details for a student</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<p><a href="browseable-list.php"><<< Back to list</a></p>
<h1>A Details View Example</h1>
<?php

//simple validation to see if we found a student
if($student){
	echo "<h1>".$student['first_name']." ".$student['last_name']."</h1>";
	echo "<p>Email: ".$student['email']."</p>";
}
else
{
	echo "<p>Can't find any student records.</p>";
}

?>
</body>
</html>