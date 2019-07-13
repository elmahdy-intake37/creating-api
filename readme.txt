API 
Ahmed Saad 
OS
number:2



default  url: http://articleapi.com/
description:create&login&getinformation about user and create  article & delete article &view all article&view specific article

retrun -->json 
------------------------------------------------------------------------------------------------
1-login
url:/log.php?username =” “ &password=” ”

method:get
********************************
params: username /  / password    *
all of this param are requried *
********************************
request: ---------------------------->
 http://articleapi.com/login.php
?username=ahmed&password=12345

response:<----------------------------
sucess:------------>
  'code'=>'200',
  'message'=>['test msg'],
  'succuess'=>'true',
  'login_tocken'=>'HJttJaIVkYBMpYmX6r4D6a0YKmwFO7OQlqSOjxjPqyA=',
]
failure:----------->
$ouput=[
    'code'=>'200',
    'message'=>['login failed please register'],
    'error'=>'false',
  ];
server error :------>
  $ouput=[
    'code'=>'400',
    'message'=>['server failed'],
    'error'=>'false',
  ];
//-------------------------------------------**------------------------------------------------------
---------------------------------------------**------------------------------------------------------
 2-user createuser 
url:/createuser.php
method:get
********************************
params:  name/email / password          *
all of this param are requried *
********************************
request:---------------------------->
 http://articleapi.com/login.php?
name=ahmed&email=ay@yahoo.com&password=1234
response:<----------------------------
sucess---->
$ouput=[
  'code'=>'200',
  'message'=>['test msg'],
  'succuess'=>'true',

];
and update token every time user login 

failure--->
  $ouput=[
    'code'=>'200',
    'message'=>['login failed please register'],
    'error'=>'false',
  ];

server error ----->
  $ouput=[
    'code'=>'400',
    'message'=>['server failed'],
    'error'=>'false',
  ];

//---------------------------------------------**-----------------------------------------------------
-----------------------------------------------**-----------------------------------------------------
3-get  user information
get user data if token valid
url:/userinfo.php
method:get
********************************
params: token                  *
all of this param are requried *
********************************
request:---------------------------->
 http://articleapi.com/login.php??token=LdgjHPK1nnQb1NzK4EV0
response:<----------------------------
sucess---->
{"code":"200","message":"select sucessfuly","success":"true","article":{"id":"1","email":"ay@yahoo.com",name="ahmed"}}
//----------------------------------------------**--------------------------------------------------------
------------------------------------------------**--------------------------------------------------------

4-create article 
url:/createarticle.php

method:get
****************************************
params:  token / title/ body           *
all of this param are requried         *
****************************************
request:---------------------------->
articleapi.com/?createarticle.php?token=HWh92kzrrDNzAXEmEBTm&title=test&body=test

response:<----------------------------
sucess---->
$ouput=[
  'code'=>'200',
  'message'=>['test msg'],
  'succuess'=>'true',

];
failure--->
  $ouput=[
    'code'=>'200',
    'message'=>['login failed please register'],
    'error'=>'false',
  ];
server error ----->
  $ouput=[
    'code'=>'400',
    'message'=>['server failed'],
    'error'=>'false',
  ];
}
//--------------------------------------------**------------------------------------------------------
----------------------------------------------**-----------------------------------------------------
5-delete article 
delete article if token and article_id valid
url:/deletearticle.php
method:get
********************************
params:  token /title    *
all of this param are requried *
********************************
request:---------------------------->
http://articleapi.com/?deletearticle.php?token=LdgjHPK1nnQb1NzK4EV0&article_id=1
response:<----------------------------
sucess---->
$ouput=[
  'code'=>'200',
  'message'=>['deleted'],
  'succuess'=>'true',

];
failer:
$ouput=[
    'code'=>'200',
    'message'=>['failed to delete'],
    'error'=>'false',
:servererror
$ouput=[
    'code'=>'400',
    'message'=>['server failed'],
    'error'=>'false',
  ];
//----------------------------------------------**----------------------------------------------------
------------------------------------------------**----------------------------------------------------
6-view all article
select all article if token vaild
url:/viewarticles.php
method:get
**********************************
params:  token                   *
all of this param are requried   *
**********************************
request:---------------------------->
http://articleapi.com/viewarticles.php?token=LdgjHPK1nnQb1NzK4EV0
response:<----------------------------
sucess---->
$ouput['articles'][]=[
  'message'=>'',
  'titel'=>$row['title'],
  'body'=>$row['body'],
  'succuess'=>'true',

];    'code'=>'200',
    'message'=>['login failed please register'],
    'error'=>'false',
  ];

server errror:
  $ouput=[
    'code'=>'400',
    'message'=>['server failed'],
    'error'=>'false',
  ];
//-----------------------------------------------**--------------------------------------------------
-------------------------------------------------**--------------------------------------------------



