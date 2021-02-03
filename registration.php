<?php
  require_once('config.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Import of Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>

    <!-- The logic behind the HTML, simple php code for validate info, sending and save it -->
    <div>
        <?php
        // Check if the information contained in my "send_info" POST is not null
        if (isset($_POST['send_info'])) {
            // Get the form variables
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phonenumber = $_POST['phonenumber'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Before we save the info, we must validate if the password and the confirm_password variables match, this is just to be sure of our new password so we dont type anything unwanted
            if($confirm_password != $password){
                // If doesnt match, it will show an error
                echo "Confirm Password doesnt match";
            }else{
                // If passwords match, it will set the variables to consume the service and save the data. 
                $sql = "INSERT INTO users (firstname, lastname, phonenumber, email, password) VALUES(?,?,?,?,?)";
                $insert_statement = $database->prepare($sql);
                $result = $insert_statement->execute([$firstname, $lastname, $phonenumber ,$email, $password]);
                if($result){
                    echo 'Succesfully Saved';
                }else{
                    echo 'There was an error saving the data, please try again.';
                }
            }
        }
        ?>
    </div>

    <!-- Sing in html form, here´s where our user send his/her information. -->
    <div>
        <form action="registration" method="post">
            <div class="form-container">
                <div class="row">
                    <div class="col-sm-3" style="margin-left: auto;margin-right: auto;margin-top: 5%;width: 30%;">
                        <h1 style="margin-bottom: 20px;">Registration</h1>
                        <label for="firstname"><b>First Name</b></label>
                        <input class="form-control" style="margin-bottom:20px;" type="text" name="firstname" required>

                        <label for="lastname"><b>Last Name</b></label>
                        <input class="form-control" style="margin-bottom:20px;" type="text" name="lastname" required>

                        <label for="phonenumber"><b>Phone Number</b></label>
                        <input class="form-control" style="margin-bottom:20px;" type="text" name="phonenumber" required>

                        <label for="email"><b>Email Address</b></label>
                        <input class="form-control" style="margin-bottom:20px;" type="email" name="email" required>

                        <label for="password"><b>Password</b></label>
                        <input class="form-control" style="margin-bottom:20px;" type="password" name="password" required>

                        <label for="confirm_password"><b>Confirm Password</b></label>
                        <input class="form-control" style="margin-bottom:20px;" type="password" name="confirm_password" required>

                        <input class="btn btn-primary" style="margin-bottom:20px;width: 100%;" type="submit" name="send_info" value="Sing In">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="./js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
    $(function(){
        alert('Hello')
    });
    </script>

</body>

</html>