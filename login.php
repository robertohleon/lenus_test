<?php

session_start();

if (isset($_SESSION['userlogin'])) {
    header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <title>Test Login</title>
</head>

<body>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-1">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="logo-container">
                        <img src="./assets/images/test_logo.svg" alt="Test" class="logo-image">
                    </div>
                </div>
                <div class="d-flex justify-content-center form-container">
                    <form action="" style="margin-top: 45px;">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text" style="background-color: #ffc107;"><img src="./assets/images/account.svg" style="width: 25px;" alt=""></span>
                            </div>
                            <input class="form-control input_user" type="text" name="username" id="username" required>
                        </div>
                        <div class="input-group" style="margin-bottom: 25px;">
                            <div class="input-group-append">
                                <span class="input-group-text" style="background-color: #ffc107;"><img src="./assets/images/pass.svg" style="width: 25px;" alt=""></span>
                            </div>
                            <input class="form-control input_user" type="password" name="password" id="password" required>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login-container">
                            <button type="button" name="button" id="login" class="btn btn-primary" style="width: 100%;">Login</button>
                        </div>
                        <div class="mt-4">
                            <div class="d-flex justify-content-center links">
                                <a href="registration.php">Register.</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/jquery-3.5.1.min.js"></script>
    <script src="./plugins/sweetalert2.all.min.js"></script>

    <script>
        $(function() {
            $('#login').click(function(e) {


                var validation = this.form.checkValidity();

                if (validation) {
                    var username = $('#username').val();
                    var password = $('#password').val();

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'login_method.php',
                        data: {
                            username: username,
                            password: password
                        },
                        success: function(data) {
                            console.log(data)
                            
                            if($.trim(data) === "1"){
                                Swal.fire(
                                'Welcome ', username,
                                'success'
                            )
                                setTimeout(' window.location.href = "index.php"', 1500);
                            }else{
                                Swal.fire(
                                'Errors',
                                data,
                                'error'
                            )
                            }
                                
                        },
                        error: function(data) {
                            Swal.fire(
                                'Errors',
                                data,
                                'error'
                            )
                        }
                    })
                } else {
                    Swal.fire(
                        'Errors',
                        "Incomplete credentials",
                        'error'
                    )

                }


            })
        });
    </script>

</body>

</html>