<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
include('db.php');
$ouput=[];
// $_GET['username'];
// $_GET['passowrd'];
extract($_GET);
// print_r($_GET);
// die();

@$conn = mysqli_connect($servername, $name, $pass,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

    $tokenId = base64_encode(mcrypt_create_iv(32));
    // var_dump(  $tokenId);
    // die();

$sql="SELECT * FROM user WHERE name='".$username."'and password='".$password."'";
$result = $conn->query($sql);
$resultdata=mysqli_fetch_assoc($result);


if($resultdata){
  foreach ($resultdata as $key => $value) {
    # code...

$ouput=[
  'code'=>'200',
  'message'=>['test msg'],
  'succuess'=>'true',
  'login_tocken'=>'HJttJaIVkYBMpYmX6r4D6a0YKmwFO7OQlqSOjxjPqyA=',
];
}
}elseif(!$resultdata)
{
  $ouput=[
    'code'=>'200',
    'message'=>['login failed please register'],
    'error'=>'false',
  ];

}else {
  $ouput=[
    'code'=>'400',
    'message'=>['server failed'],
    'error'=>'false',
  ];

}
//
// $output['article']=[
//   'id'=>'1',
//   'user_id'=>'10',
//   'article'=>'article 1',
//   'body'=>'article 1 body',
//
// ];

echo json_encode($ouput);
exit;

 ?>
