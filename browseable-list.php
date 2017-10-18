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
    //outputs a hyperlink for each student e.g. <a href="details.php?id=4">Yousef Miandad</a>
    //each hyperlink has a query string (look back at practical 1) that specifies which student has been clicked on
    echo "<a href='details.php?id=" . $student["id"] . "'>";
    echo $student["first_name"]." ".$student["last_name"];
	echo "</a>";
    echo "</p>";
}

?>
</body>
</html>