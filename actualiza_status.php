<?php include("db.php");


require '/vendor/autoload.php';
use GuzzleHttp\Client;

$cntr= $_POST['cntr'];
$description=  $_POST['description'];
$user = $_SESSION['user'];
$empresa = $_SESSION['company'];
$booking = $_POST['booking'];
foreach ($_POST['statusGral'] as $statusGral);

$date = date('Y-m-d H:i');
$url = 'http://127.0.0.1:8000/api/mailStatus?cntr='.$cntr.'&date='.$date.'&statusGeneral='.$statusGral.'&description='.$description.'&empresa='.$empresa.'&user='.$user.'&booking='.$booking  ;


$client = new Client([
  'base_uri' => $url,
  'timeout'  => 5.0,
]);
//Hacer la llamada al metodo get, sin ningÃºn parametro
$res = $client->request('GET');
if ($res->getStatusCode() == '200') //Verifico que me retorne 200 = OK
{
echo $res->getBody();
}
?>