<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//the id from the query string e.g. details.php?id=4
$studentId=$_POST['id'];

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
<title>Edit student</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
		<p><a href="edit-list.php"><<< Back to list</a></p>
	<h1>Edit student details</h1>
<?php
//simple validation to see if we found a student
if($student){
?>
	
	<form action="update.php" method="POST">
	<!-- <input type="hidden"> creates a hidden text field i.e. not visible to the user
	we use it to store the id number of the selected student -->
	<input type="hidden" name="id" value="<?php echo $student["id"];?>">
	<label for="first_name">First name:</label>
	<!-- we need to display the student's details in the form so we set the value of the HTML form controls -->
	<input type="text" id="first_name" name="first_name" value="<?php echo $student["first_name"];?>">
	<label for="last_name">Last name:</label>
	<input type="text" id="last_name" name="last_name" value="<?php echo $student["last_name"];?>">
	<label for="email">Email:</label>
	<input type="email" id="email" name="email" size="40" value="<?php echo $student["email"];?>">
	<input type="submit" name="submitBtn" value="Save changes">
	</form>
<?php
}else{
	echo "<p>Can't find any student records.</p>";
}
?>


</body>
</html>