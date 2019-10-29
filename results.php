<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
//the search term the user entered
$searchTerm=$_GET['search'];

//Need to use a LIKE for fuzzy matching (look back to when we looked at SQL) 
$stmt = $conn->prepare("SELECT * FROM students WHERE last_name LIKE :searchTerm");
$stmt->bindValue(":searchTerm","%{$searchTerm}%");
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
<p><a href="search.php"><<< Back to search again</a></p>
<h1>Search Results</h1>
<?php
//check to see if there are any results
if($students){
	foreach ($students as $student) {
	    echo "<p>";
	    echo "{$student["first_name"]} {$student["last_name"]}";
	    echo "</p>";
	}
}else{
	echo "<p>No search results</p>"; 
}

?>
</body>
</html>
