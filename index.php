<?php
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$indeks = $_POST['indeks'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "it255-dz07";
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
 die("Konekcija ima grešku" . mysqli_connect_error());
}

mysqli_select_db($conn,$database);

$insert = "INSERT INTO student (ime,prezime,indeks) VALUE (?,?,?)";
$query = $conn->prepare($insert);
$query->bind_param('ssi',$ime,$prezime,$indeks);
$query->execute();
$query->close();

?>