<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//select all the students
$query = "SELECT * FROM students";
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
foreach ($students as $student) {
    echo "<p>";
    echo $student["first_name"]." ".$student["last_name"];
    //outputs a hyperlink for each student e.g. <a href="details.php?id=4">delete</a>
    //each hyperlink has a query string (look back at practical 1) that specifies which student has been clicked on
	echo " (<a href='delete.php?id=" . $student["id"] . "'>delete</a>)";
    echo "</p>";
}

?>
</body>
</html>