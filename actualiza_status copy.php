<?php include("db.php");

$cntr= $_POST['cntr'];
$description=  $_POST['description'];
$user = $_SESSION['user'];
$empresa = $_SESSION['company'];
$booking = $_POST['booking'];
foreach ($_POST['statusGral'] as $statusGral);

$date = date('Y-m-d H:i');
$url = 'http://127.0.0.1:8000/api/mailStatus?cntr='.$cntr.'&date='.$date.'&statusGeneral='.$statusGral.'&description='.$description.'&empresa='.$empresa.'&user='.$user.'&booking='.$booking;
echo $url;

$client = curl_init($url);
$response = curl_exec($client);
return $response;

?>