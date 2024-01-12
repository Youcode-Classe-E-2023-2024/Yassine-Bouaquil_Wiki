<?php
include_once '../includes/header.php';
?>

<body>
</head>
<body class="max-w-screen-lg mx-auto">
    <header class="flex items-center justify-between py-2">
    <a href="index.php" class="px-2 lg:px-0 font-bold capitalize">
        WIKI
    </a>
    <ul class="hidden md:inline-flex items-center">
        <li class="px-2 md:px-4">
            <a href="index.php" class="text-red-800 font-semibold hover:text-blue-600"> Home </a>
        </li>
        <li class="px-2 md:px-4">
            <a href="#" class="text-gray-500 font-semibold hover:text-blue-600"> About </a>
        </li>
        <li class="px-2 md:px-4">
            <a href="#" class="text-gray-500 font-semibold hover:text-blue-600"> Press </a>
        </li>
        <li class="px-2 md:px-4">
            <a href="#" class="text-gray-500 font-semibold hover:text-blue-600"> Contact </a>
        </li>

        <?php if (isset($_SESSION["login"])) {

            if (empty($_SESSION["admin"])) {
                ?>
                <li class="px-2 md:px-4 hidden md:block">
                    <a id="manage-wikis-btn" class="cursor-pointer text-gray-500 font-semibold hover:text-blue-600"> Manage My Wikis </a>
                </li>
            <?php } else { ?>
                <li class="px-2 md:px-4 hidden md:block">
                    <a id="manage-wikis-btn" class="cursor-pointer text-gray-500 font-semibold hover:text-blue-600"> Manage Wikis </a>
                </li>
            <?php } ?>      
            <li class="px-2 md:px-4 hidden md:block">
                <form action="index.php?page=home" method="post">
                    <button name="logout" class="text-gray-500 font-semibold hover:text-green-600"> Logout</button>
                </form>
            </li>
        <?php } else { ?>
            <li class="px-2 md:px-4 hidden md:block">
                <a href="register_view.php" class="text-gray-500 font-semibold hover:text-blue-600"> Login </a>
            </li>
            <li class="px-2 md:px-4 hidden md:block">
                <a href="register_view.php" class="text-gray-500 font-semibold hover:text-blue-600">
                    Register </a>
            </li>

        <?php } ?>
    </ul>

    </header>



    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <!-- Login Form -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Login</h2>
                    </div>
                    <div class="card-body">


                        <form action="../includes/login_inc.php" method="POST">
                            <div class="form-group">
                                <label for="loginEmail">User Name:</label>
                                <input type="text" class="form-control" id="loginusername" name="username">
                            </div>
                            <div class="form-group">
                                <label for="loginPassword">Password:</label>
                                <input type="password" class="form-control" id="loginPassword" name="pwd">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        </form>
                        <?php

                        check_login_errors();

                        ?>




                    </div>
                </div>
            </div>



            <div class="col-md-6">
                <!-- Signup Form -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Registration</h2>
                    </div>
                    <div class="card-body">
                        <form id="signupForm" method="POST">
                            <div class="form-group">
                                <label for="registerUsername">Username:</label>
                                <input type="text" required class="form-control" id="registerUsername" name="username">
                            </div>
                            <div class="form-group">
                                <label for="registerEmail">Email:</label>
                                <input type="email" required class="form-control" id="registerEmail" name="email">
                            </div>
                            <div class="form-group">
                                <label for="registerPassword">Password:</label>
                                <input type="password" required class="form-control" id="registerPassword" name="pwd">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Register</button>
                        </form>
                        <div id="signupErrorMessages" class="mt-3"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>







    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log("Script is running!");
            $("#signupForm").submit(function(event) {
                event.preventDefault(); // Prevent the default form submission
                var formData = $(this).serialize(); // Serialize the form data
                $.ajax({
                    type: "POST",
                    url: "../includes/signup.inc.php", // Use the correct path to your signup_ajax.php file
                    data: formData,
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.success) {
                            alert("Signup successful!"); // You can redirect or perform other actions here
                        } else {
                            // Display errors in the designated div
                            $("#signupErrorMessages").html("<div class='alert alert-danger'>" + data.errors.join('<br>') + "</div>");
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>