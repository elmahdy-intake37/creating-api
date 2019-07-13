<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('db.php');

require_once 'nusoap-master/nusoap.php';


class apI{

public $conn;
  public function database(){

    $servername="localhost";
    $name="root";
    $pass="root";
    $dbname="Article API";
    @$this->conn = mysqli_connect($servername, $name, $pass,$dbname);

    // Check connection
    if (!$this->conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

   function closedb()
    {
      $this->conn->close();
    }
    // echo "Connected successfully";

    $result;
}
// $username;
// $password;

  public function login($username,$password){
// return "here";
    $this->database();
    $this->conn;
    $sql="SELECT * FROM user WHERE name='".$username."'and password='".$password."'";
    $result = $this->conn->query($sql);
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
return json_encode($ouput);
$this->closedb();
  }
//for create user


public function createuser($name1,$email,$password){

  $this->database();
 $this->conn;
  $tokenId = base64_encode(mcrypt_create_iv(32));


  $sql="insert into user(name,email,password,logintoken) values ('$name1','$email','$password','$tokenId')";

  $result = $this->conn->query($sql);




  // $resultdata=mysqli_fetch_assoc($result);


  if($result){
    // foreach ($resultdata as $key => $value) {
      # code...

  $ouput=[
    'code'=>'200',
    'message'=>['test msg'],
    'succuess'=>'true',

  ];

  }elseif(!$result)
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

return json_encode($ouput);
$this->closedb();
}


//for create articles

public function createarticle($logintoken,$title,$body)
{
  $this->database();
  $this->conn;
  $sql="SELECT * FROM user WHERE logintoken='".$logintoken."'";
  $result = $this->conn->query($sql);

  $resultdata=mysqli_fetch_assoc($result);




  $userid=$resultdata['id'];
  if($resultdata){
    foreach ($resultdata as $key => $value) {
      # code...
      $sql="insert into Article(user_id,title,body) values ($userid,'$title','$body')";
      // echo $sql;
      // die();
    $result = $this->conn->query($sql);
  $ouput=[
    'code'=>'200',
    'message'=>['test msg'],
    'succuess'=>'true',

  ];
  }
  }elseif(!$resultdata){
    $ouput=[
      'code'=>'200',
      'message'=>['login failed please register'],
      'error'=>'false',
    ];
  }
  else {
    $ouput=[
      'code'=>'400',
      'message'=>['server failed'],
      'error'=>'false',
    ];

  }

  return json_encode($ouput);
  $this->closedb();

}


 public function viewarticle($logintoken)
 {
   $this->database();
   $this->conn;
   $sql="SELECT * FROM user WHERE logintoken='".$logintoken."'";
   $result = $this->conn->query($sql);

   $resultdata=mysqli_fetch_assoc($result);
   $userid=$resultdata['id'];
   if($resultdata){

       # code...
       $sql="SELECT * FROM Article" ;

     $result = $this->conn->query($sql);
     while($row = mysqli_fetch_assoc($result)){
   $ouput['articles'][]=[
     'message'=>'',
     'titel'=>$row['title'],
     'body'=>$row['body'],
     'succuess'=>'true',

   ];

   }
   }elseif(!$resultdata){
     $ouput=[
       'code'=>'200',
       'message'=>['login failed please register'],
       'error'=>'false',
     ];
   }

   else {
     $ouput=[
       'code'=>'400',
       'message'=>['server failed'],
       'error'=>'false',
     ];

   }

   return json_encode($ouput);

 }
 public function dele($title, $logintoken){
   $this->database();
   $this->conn;
   $sql="SELECT * FROM user WHERE logintoken='".$logintoken."'";
// echo $sql;
// die();
   $result = $this->conn->query($sql);


   $resultdata=mysqli_fetch_assoc($result);

   if($resultdata){
     foreach ($resultdata as $key => $value) {
       # code...
       $sql="DELETE FROM Article WHERE title='".$title."'";
      //  echo $sql;
      //  die();
     $result = $this->conn->query($sql);
   $ouput=[
     'code'=>'200',
     'message'=>['deleted'],
     'succuess'=>'true',

   ];
   }
   }elseif(!$resultdata){
     $ouput=[
       'code'=>'200',
       'message'=>['failed to delete'],
       'error'=>'false',
     ];
   }
   else {
     $ouput=[
       'code'=>'400',
       'message'=>['server failed'],
       'error'=>'false',
     ];

   }

   return json_encode($ouput);
   $this->closedb();

 }


 public function userinfo($logintoken)
 {
   $this->database();
   $this->conn;
   $sql="SELECT * FROM user WHERE logintoken='".$logintoken."'";
   $result = $this->conn->query($sql);
   $resultdata=mysqli_fetch_assoc($result);
if($resultdata){
  $sql="SELECT * FROM user WHERE logintoken='".$logintoken."'";
  $result = $this->conn->query($sql);
   while($row = mysqli_fetch_assoc($result)){


 $ouput['user'][]=[
   'message'=>'',
   'name'=>$row['name'],
   'email'=>$row['email'],
   'succuess'=>'true',

 ];

 }
 }elseif(!$resultdata){
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
 return json_encode($ouput);
 $this->closedb();

 }

}
$obj=new apI();
//
// $type= $obj->userinfo("T/1rYgK2t6bo2kiWfMuKdReip/jytHVMI+AbZLfd/0k=");
// print_r($type);
// exit;

$server = new soap_server();
$server->configureWSDL("apiservice");

$server->register("apI.login",
array("username" => "xsd:string","password" => "xsd:string"),
array("return" => "xsd:string"));

$server->register("apI.createuser",
array("name" => "xsd:string","email"=>"xsd:string","password" => "xsd:string"),
array("return" => "xsd:string"));

$server->register("apI.createarticle",
array("logintoken"=>"xsd:string","title"=>"xsd:string","body"=>"xsd:string"),
array("return" => "xsd:string"));

$server->register("apI.viewarticle",
array("logintoken"=>"xsd:string"),
array("return" => "xsd:string"));

$server->register("apI.dele",
array("title"=>"xsd:string","logintoken"=>"xsd:string"),
array("return" => "xsd:string"));

$server->register("apI.userinfo",
array("logintoken"=>"xsd:string"),
array("return" => "xsd:string"));
$server->service(file_get_contents("php://input"));


 ?>
