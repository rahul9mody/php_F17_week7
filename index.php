<?php

$userName = "*****";
$password = "*********";
$hostname = "***********";

$dsn = "mysql:host=$hostname;dbname=$userName";

try
{
	$conn = new PDO($dsn, $userName, $password);
	

  $sql = "SELECT * FROM todos";
  $query = $conn->prepare($sql);
  $query->execute();

  $results = $query->fetchALL();
  if($query->rowCount() > 0)
  {
     echo "Results: ".$query->rowCount()."<br>";
     echo"<table border=\"1\"><tr><th>ID</th><th>Task</th></tr>";
    
    foreach ($results as $row) 
    {
       echo "<tr><td>".$row["id"]."</td><td>".$row["message"]."</td></tr>";
    }
  }

  else
  {
    echo "0 results";
  }

  $q->closeCursor();
}

catch (PDOException $e)
{
	echo "Connection failed: ".$e->getMessage();
}

$conn = null;

?>