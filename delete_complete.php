<?php
mb_language('ja');
mb_internal_encoding("UTF-8");

$id = $_POST['id'];

$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");

$stmt = $dbh->prepare('UPDATE account SET delete_flag = $delete_flag where id = '.$id);

$stmt->execute(array('$delete_flag' => $_POST['delete_flag']));