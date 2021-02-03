<!-- Configuration of database variables and conections. -->
<?php
    $db_user = "root";
    $db_password = "";
    $db_name = "lenus_users";

    $database = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_password);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>