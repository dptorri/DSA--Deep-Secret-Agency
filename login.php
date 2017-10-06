<?php
include_once 'db_connect.php';
$db = db_connect();
//
$stmt = $db->prepare('SELECT * FROM messages');
$stmt ->execute();
$messages = $stmt->fetchAll();
//var_dump($messages);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
            body{
                background-color: Ivory  ;
            }
            div.white-box{
                max-width:30%;
                min-height:200px;
                padding: 1% 5% 1% 5%;
                background-color: GhostWhite ;
                border: 2px  solid Gainsboro;
            }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">DSA - Deep Secret Agency</a>
    </div>
    <ul class="nav navbar-nav">
        <!--
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li> -->
    </ul>
  </div>
</nav>

<div class="container-fluid">

<div class="container white-box">
    <h3>Sign in</h3>
    <form action="" method="post">
    Username:<input type="text" class="form-control" id="usr"><br>
    Password:<input type="text" class="form-control" id="pwd"><br>
    <button type="submit" class="btn btn-block btn-primary" name="signin">Sign in</button>
    <button type="submit" class="btn btn-block" name="signup">Sign up</button>
</form>
<?php
//PHP Form validation
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";
//check if there is data passed to the $_POST array at all, else do nothing
//solve the undefined variable for usr and pwd elements in the array
//so exits but value is null
$username = isset($_POST['usr']) ? $_POST['usr'] : null;
//is empty()
$username = !empty($_POST['usr']) ? $_POST['usr'] : null;
if($_POST){

if($_POST["usr"] == null){
    echo 'Please fill out the Username';
}
if($_POST["pwd"] == null){
    echo 'Please fill out the Password';
}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["usr"]);
    $password = test_input($_POST["pwd"]);
}

//this part just chech that the type of data is suitable
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}?>
</div>
       

</div>
</body>
</html>
