<?php
require_once('config.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
$select_statment = $database->prepare($sql);
$result = $select_statment->execute([$username, $password]);


if($result){
    $user = $select_statment->fetch(PDO::FETCH_ASSOC);
    if($select_statment->rowCount() > 0){
        $_SESSION['userlogin'] = $user;
        echo '1';
    }else{
        echo 'There is no user with this credentials';
    }
}else{
    echo "Connectivity error, try again.";
}

?>