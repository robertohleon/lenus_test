<?php
require_once('config.php')
?>

<?php
// Check if the information contained in my "send_info" POST is not null
if (isset($_POST)) {
    // Get the form variables
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (firstname, lastname, phonenumber, email, password) VALUES(?,?,?,?,?)";
    $insert_statement = $database->prepare($sql);
    $result = $insert_statement->execute([$firstname, $lastname, $phonenumber, $email, $password]);
    if ($result) {
        echo 'Succesfully Saved';
    } else {
        echo 'There was an error saving the data, please try again.';
    }
}else{
    echo "Error on request";
}
?>