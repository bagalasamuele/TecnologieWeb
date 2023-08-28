<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./assets/css/style.css" rel="stylesheet">
    <style>
        .error {
            border: 1px solid red;
        }
    </style>
    <script>
        function validateForm() {
            var nickname = document.getElementById("nickname");
            var password = document.getElementById("password");

            var valid = true;

            if (nickname.value.trim() === "") {
                nickname.classList.add("error");
                valid = false;
            } else {
                nickname.classList.remove("error");
            }

            if (password.value === "") {
                password.classList.add("error");
                valid = false;
            } else {
                password.classList.remove("error");
            }

            return valid;
        }
    </script>
</head>
<body>
    <?php
    session_start();
    include "php/DB_Connection.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
        $nickname = htmlspecialchars($_POST["nickname"]);
        $password = htmlspecialchars($_POST["password"]);

        if (!empty($nickname) && !empty($password)) {
            $nickname = $db->real_escape_string(strip_tags($nickname));
            $password = $db->real_escape_string(strip_tags($password));
            $passwordHash = md5($password);

            $query = $db->query("SELECT idUser, nickname, role FROM users WHERE nickname='$nickname' AND password='$passwordHash'");

            if ($query->num_rows === 1) {
                $row = $query->fetch_object();
                $user_role = $row->role;

                if ($user_role === 'admin') {
                    $admin_request = true;
                }

                session_regenerate_id();
                $_SESSION['idUser'] = $row->idUser;
                $_SESSION['session_userRole'] = $user_role;

                header('Location: pages/Home.php');
                exit();
            } else {
                $login_error = "Nickname or password incorrect";
            }
        } else {
            $login_error = "Fill in all fields!";
        }
    }
    ?>

    <?php if (isset($login_error)) { ?>
        <div class="alert alert-danger">
            <?php echo $login_error; ?>
        </div>
    <?php } ?>

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm();">
                            <div class="mb-3">
                                <label for="nickname" class="form-label">Nickname:</label>
                                <input type="text" class="form-control" id="nickname" name="nickname">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Login</button>
                            <div class="mt-3 text-center">
                                Not a member yet? <a href="./pages/SignUp.php" class="reg">Register now</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
