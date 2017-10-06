<?php
require_once 'db_connect.php';
if($_POST)
{   
    $db = db_connect();
    $user=$_POST['usr'];
    $pass=$_POST['pwd'];
    $stmt = $db->prepare('SELECT `password` FROM `users` WHERE `name` = ?');//? protects from sql injection
    $stmt ->execute([$user]);// if not square braket returns a error in list format
    $pw = $stmt->fetch();

    if(!isset($user) OR strlen($user)== 0)
    { echo 'Please fill out the Username';exit(); }   
    if(!isset($pass) OR strlen($pass)== 0)
    { echo 'Please fill out the password';exit();}

    if($pw['password']==$pass)
        {    
        header('Location: index_.php');
        exit();
        }
        else
        {
            echo 'Wrong username or password';exit();
        }
}



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
    <style>body{background-color: Ivory;} div.white-box{max-width:30%;min-height:200px;padding: 1% 5% 1% 5%; background-color: GhostWhite ; border: 2px  solid Gainsboro;}
    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">DSA - Deep Secret Agency</a>
        </div>
        <ul class="nav navbar-nav">
        </ul>
    </div>
</nav>
<div class="container-fluid">
<div class="container white-box">
<?php
if($_POST){
    $db = db_connect();
    $stmt = $db->prepare(
        'INSERT INTO `users` (`name`,`password`) VALUES (?,?);'
    );
    $hash = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    $stmt->execute([[$_POST], $hash]);
    header('Location: login.php');
    exit();
}
?>

    <h3>Register</h3>
    <form action="register.php" method="post">
    Username:<input type="text" class="form-control" name="usr"><br>
    Password:<input type="text" class="form-control" name="pwd"><br>
    E-Mail:<input type="email" class="form-control" name="email"><br>
    <button type="submit" class="btn btn-block btn-primary" >Sign in</button>
    <button type="submit" class="btn btn-block" >Sign up</button>
</form>
</div>
</div>

</body>
</html>
