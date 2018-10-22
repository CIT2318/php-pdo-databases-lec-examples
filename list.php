<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=simple-examples', 'root', '');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//select all the students
$query = "SELECT first_name, last_name, course FROM students";
$resultset = $conn->query($query);
$students = $resultset->fetchAll();
$conn=NULL;

?>


<!DOCTYPE HTML>
<html>
<head>
<title>List the students</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php

//check to see if there are any results
if($students){
	//loop over the array of students and display their name
	foreach ($students as $student) {
	    echo "<p>{$student['first_name']} {$student['last_name']} {$student['course']}</p>";
	}
}else{
	echo "No records found";
}


?>
</body>
</html>