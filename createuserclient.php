<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'nusoap-master/nusoap.php';

$client = new nusoap_client("http://articleapi.com/api.wsdl", true);
$error = $client->getError();
if ($error) {
echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
$result = $client->call("apI.createuser", array("name" => "ahmed1","email"=>"ahmed@ay7ga.com","password"=>"1234566"));
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
