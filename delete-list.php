<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
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
    <p><a href="index.php"><<< Home</a></p>
  <h1>Delete Student</h1>
  <p>Select student(s):</p>
<form action="delete.php" method="POST">
<?php
foreach ($students as $student) {
    echo "<p>";
    echo "<label>";
    //outputs a checkbox button for each student e.g. <label><input type="checkbox" name="ids[]" value="5" '="">Sunil Laxman</label>
    echo "<input type='checkbox' name='ids[]' value='{$student["id"]}''>";
    echo "{$student["first_name"]} {$student["last_name"]}";
    echo "</label>";
    echo "</p>";
}
?>
<input type="submit">
</form>

</body>
</html>