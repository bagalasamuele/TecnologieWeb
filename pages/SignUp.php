<!DOCTYPE html>
<html>

<head>
    <title>Registrati</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/style.scss" rel="stylesheet">
    <script src="../assets/js/validators.js"></script>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center ">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center"> Register </h5>
                        <!-- Form di login -->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                            onsubmit="return validateForm();">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname:</label>
                                <input type="text" class="form-control" id="surname" name="surname">
                            </div>
                            <div class="mb-3">
                                <label for="nickname" class="form-label">Nickname:</label>
                                <input type="text" class="form-control" id="nickname" name="nickname">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="mb-3">
                                <label for="CheckPassword" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="checkpassword" name="checkpassword">
                            </div>
                            <div class="two-select-row col-md-12">
                                <div class="mb-3 col-xs-12 col-md-6 px-1">
                                    <label for="role" class="form-label">Ruolo:</label>
                                    <select name="role" class="form-select">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-xs-12 col-md-6 px-1">
                                    <label for="diet" class="form-label">Regime alimentare:</label>
                                    <select name="diet" class="form-select">
                                        <option value="onnivoro">Onnivoro</option>
                                        <option value="vegetariano">Vegetariano</option>
                                        <option value="vegano">Vegano</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Login</button>
                            <div class="mt-3 text-center">
                                <a href="../index.php" class="reg">Sing in</a> to your account.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "../html/footer.html"; ?>
</body>

</html>