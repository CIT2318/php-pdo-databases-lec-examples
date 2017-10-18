<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
//the search term the user entered
$searchTerm=$_GET['search'];

//Need to use a LIKE for fuzzy matching just like in previous weeks 
$stmt = $conn->prepare("SELECT * FROM students WHERE last_name LIKE :searchTerm");
$stmt->bindValue(':searchTerm','%'.$searchTerm.'%');
$stmt->execute();
$students = $stmt->fetchAll();
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Search results</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php

foreach ($students as $student) {
    echo "<p>";
    echo $student["first_name"]." ".$student["last_name"];
    echo "</p>";
}

?>
</body>
</html>