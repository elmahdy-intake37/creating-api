<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'nusoap-master/nusoap.php';

$client = new nusoap_client("http://articleapi.com/api.wsdl", true);
$error = $client->getError();
if ($error) {
echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
$result = $client->call("apI.createarticle", array("logintoken"=>"T/1rYgK2t6bo2kiWfMuKdReip/jytHVMI+AbZLfd/0k=","title"=>"sport","body"=>"wow"));
var_dump($result);

if($client->fault){
  echo "<h2>Fualt</h2><pre>";
  print_r($result);
  echo "</pre>";
}else{
  $error=$client->getError();
  if($error){
    echo "<h2>Result</h2>";
    echo $result;
  }
}
?>
