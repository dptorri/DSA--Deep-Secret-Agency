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
                width:50%;
                height:200px;
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
<?php foreach($messages as $value) : ?>
<div class="container white-box">
    <h3><?php echo ''. $value['user'].' level: ('.$value['level'].')'; ?></h3>
    <p><?php echo $value['text']; ?></p></div>
        <?php endforeach;?>

</div>
</body>
</html>
