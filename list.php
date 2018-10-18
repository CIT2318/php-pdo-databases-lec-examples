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
$query = "SELECT last_name, mark FROM students WHERE course LIKE '%Computing%'";
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
	    echo "<p>";
	    echo "{$student['last_name']} {$student['mark']}";
	    echo "</p>";
	}
}else{
	echo "No records found";
}


?>
</body>
</html>