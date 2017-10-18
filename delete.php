<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//This is a simple example we would normally do some form validation here

//the id from the query string e.g. details.php?id=4
$studentId=$_GET['id'];

//prepared statement uses the id to delete a single student
$stmt = $conn->prepare("DELETE FROM students WHERE students.id = :id");
$stmt->bindValue(':id',$studentId);

//when we execute the SQL statement the number of affected rows is returned
$affected_rows = $stmt->execute();
$conn=NULL;
if($affected_rows==1){
    $msg="<p>Deleted student with id of ".$studentId." from the database.</p>";
}else{
    $msg="<p>There was a problem deleting the record.</p>";
}
$conn=NULL;
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Delete the student</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php
echo $msg;
?>
</body>
</html>