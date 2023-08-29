<!DOCTYPE html>
<html>

<head>
    <title>Registrati</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/style.scss" rel="stylesheet">
    <script src="../assets/js/validators.js"></script>
</head>


<?php 
function startNewsession(){
    if(session_status() === true){
        session_start();
    }
    session_destroy();
    session_regenerate_id(true);
    session_start();

}
    session_start();
include "../php/DB_Connection.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $lastname = $_POST['surname']; 
    $nickname = $_POST['newNickname']; 
    $email = $_POST['email'];
    $pwd = md5($_POST['newPassword']); 
    $checkpwd = md5($_POST['checkPassword']); 
    $diet = $_POST['diet'];
    $role = $_POST['role'];

    if ($name && $lastname && $nickname && $email && $pwd && $checkpwd && $diet && $role) {
        if ($pwd == $checkpwd) {
            // Prepared statements per evitare SQL injection
            $stmt = $db->prepare("INSERT INTO users(name, lastname, nickname, email, password, diet, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $name, $lastname, $nickname, $email, $pwd, $diet, $role);
            if ($stmt->execute()) {
                $query = $db->query("SELECT idUser FROM users WHERE nickname = '$nickname'");
                foreach ($query as $row) {
                    $_SESSION['idUser'] = $row['idUser'];
                    $_SESSION['session_userRole'] = $role;
                }
                header('Location: ../php/Check_SignUp.php');
                exit;
            } else {
                echo '<h5>Errore durante la registrazione</h5>';
            }
            $stmt->close();
        } else {
            echo '<h5>Password non corrispondenti</h5>';
        }
    } else {
        echo '<h5>Riempire tutti i campi</h5>';
    }
}
?>


<body>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center ">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center"> Register </h5>
                        <!-- Form di login -->
                        <form id ="container_login" action="<?php echo $_SERVER['PHP_SELF']?>" method="post"
                            onsubmit="return validateSingUp();">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname:</label>
                                <input type="text" class="form-control" id="surname" name="surname">
                            </div>
                            <div class="mb-3">
                                <label for="newNickname" class="form-label">Nickname:</label>
                                <input type="text" class="form-control" id="newNickname" name="newNickname">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword">
                            </div>

                            <div class="mb-3">
                                <label for="checkPassword" class="form-label">Confirm password :</label>
                                <input type="password" class="form-control" id="checkPassword" name="checkPassword">
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
                            <button type="submit" class="btn btn-primary" name="submit">Sing Up</button>
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