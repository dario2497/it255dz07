<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "it255-dz07";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
 die("Konekcija ima grešku" . mysqli_connect_error());
}
mysqli_select_db($conn,$database);

function getAll(){
	global $conn;
	 $select = "SELECT * FROM student";
	 if($stmt = $conn->prepare($select))
	 {
		$stmt->execute();
	 if(!$stmt->execute())
	 {
	 echo $stmt->error.' u upitu: '.$select;
	 }
	 else {
		$niz = array();
		$resultat = $stmt->get_result();
	 while ($row = $resultat->fetch_assoc()) {
	 array_push($niz,$row);
	 }
		$stmt->close();
	 return $niz;
	 }
	 $stmt->close();
	 }
}

header("Content-Type: application/json");
echo json_encode(getAll());


?>