<?php
function db_connect()
{
$db = new PDO('mysql:host=localhost;dbname=dsa;charset=utf8','root','misat0');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $db;
}