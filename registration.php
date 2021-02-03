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


    <div>
        <?php
        
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
                        <input class="form-control" style="margin-bottom:20px;" type="text" name="firstname" id="firstname" required>

                        <label for="lastname"><b>Last Name</b></label>
                        <input class="form-control" style="margin-bottom:20px;" type="text" name="lastname" id="lastname" required>

                        <label for="phonenumber"><b>Phone Number</b></label>
                        <input class="form-control" style="margin-bottom:20px;" type="text" name="phonenumber" id="phonenumber" required>

                        <label for="email"><b>Email Address</b></label>
                        <input class="form-control" style="margin-bottom:20px;" type="email" name="email" id="email" required>

                        <label for="password"><b>Password</b></label>
                        <input class="form-control" style="margin-bottom:20px;" type="password" name="password" id="password" required>

                        <label for="confirm_password"><b>Confirm Password</b></label>
                        <input class="form-control" style="margin-bottom:20px;" type="password" name="confirm_password" id="confirm_password" required>

                        <input class="btn btn-primary" style="margin-bottom:20px;width: 100%;" type="submit" name="send_info" id="registration" value="Sing In">

                        <label for="">Have an account? <a href="login.php">Login here</a></label>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Imports for jquery, sweet alert for better looking alerts and a manualy created script to passthroug information to php file, validate data and send alerts. -->

    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./plugins/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#registration').click(function(e) {
                var validation = this.form.checkValidity();

                if (validation) {
                    var firstname = $('#firstname').val();
                    var lastname = $('#lastname').val();
                    var phonenumber = $('#phonenumber').val();
                    var email = $('#email').val();
                    var password = $('#password').val();
                    var confirm_password = $('#confirm_password').val();

                    e.preventDefault();

                    if (confirm_password != password) {
                        Swal.fire(
                            '¡Ups!',
                            "Passwords does not match",
                            'error'
                        )
                    } else {
                       

                        $.ajax({
                            type: 'POST',
                            url: 'registration_method.php',
                            data: {
                                firstname: firstname,
                                lastname: lastname,
                                phonenumber: phonenumber,
                                email: email,
                                password: password
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Successfull',
                                    data,
                                    'success'
                                )
                                setTimeout(' window.location.href = "login.php"', 1500);
                            },
                            error: function(data) {
                                Swal.fire(
                                    'Errors',
                                    data,
                                    'error'
                                )
                            }
                        });
                    }
                } else {
                    Swal.fire(
                        '¡Ups!',
                        "Incomplete form",
                        'error'
                    )
                }
            })
        })
    </script>

</body>

</html>