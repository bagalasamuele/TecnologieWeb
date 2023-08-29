<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <?php include "./html/head.html"; ?>
</head>

<body>
    <?php
    // Avvio della sessione e inclusione del file di connessione al database
    session_start();
    include "php/DB_Connection.php";

    // Controllo se il modulo di login è stato inviato
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
        $nickname = htmlspecialchars($_POST["nickname"]);
        $password = htmlspecialchars($_POST["password"]);

        if (!empty($nickname) && !empty($password)) {
            // Sanitizzazione e hash della password
            $nickname = $db->real_escape_string(strip_tags($nickname));
            $password = $db->real_escape_string(strip_tags($password));
            $passwordHash = md5($password);

            // Query per verificare le credenziali dell'utente
            $query = $db->query("SELECT idUser, nickname, role FROM users WHERE nickname='$nickname' AND password='$passwordHash'");

            if ($query->num_rows === 1) {
                $row = $query->fetch_object();
                $user_role = $row->role;

                if ($user_role === 'admin') {
                    $admin_request = true;
                }

                // Creazione della sessione utente
                session_regenerate_id();
                $_SESSION['idUser'] = $row->idUser;
                $_SESSION['session_userRole'] = $user_role;

                // Reindirizzamento alla pagina Home
                header('Location: pages/Home.php');
                exit();
            } else {
                $login_error = "Nickname or password incorrect";
            }
        } else {
            $login_error = "Fill in all fields!";
            // Controllo aggiuntivi, si eseguirebbe solo in caso in cui il Javascript fallisca
        }
    }
    ?>

    <?php if (isset($login_error)) { ?>
        <!-- Visualizza messaggio di errore se necessario -->
        <div class="alert alert-danger">
            <?php echo $login_error; ?>
        </div>
    <?php } ?>

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
               <div class="align-items-center my-5"><img src='./assets/images/NovaVita_Logo.png' class="w-100"></div> 
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <!-- Form di login -->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                            onsubmit="return validateLogin();">
                            <div class="mb-3">
                                <label for="nickname" class="form-label">Nickname:</label>
                                <input type="text" class="form-control" id="nickname" name="nickname">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
                            <div class="mt-3 text-center">
                                Not a member yet? <a href="./pages/SignUp.php" class="reg">Register now</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include "./html/footer.html"; ?>
</body>

</html>