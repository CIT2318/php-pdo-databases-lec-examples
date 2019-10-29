<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456','u0123456','01jan96');
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

$query="SELECT * FROM students WHERE last_name=:lastName";

$prep_stmt=$conn->prepare($query);
$prep_stmt->bindValue(':lastName','Hutton');
$prep_stmt->execute();
$student=$prep_stmt->fetch();

$conn=NULL;

?>


<!DOCTYPE HTML>
<html>
<head>
<title>Prepared Statements</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php

echo "<p>";
echo "<p>".$student["first_name"]." ".$student["last_name"]."</p>";
echo "</p>";


?>
</body>
</html>
