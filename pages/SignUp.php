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
    include "DB_Connection.php";
    if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $lastname=$_POST['lastname'];
            $nickname=$_POST['nickname'];
            $email=$_POST['email'];
            $pwd=md5($_POST['pwd']);
            $checkpwd=md5($_POST['checkpassword']);
            $diet=$_POST['diet'];
            $role=$_POST['role'];
            if($name && $lastname && $nickname && $email && $pwd && $checkpwd && $diet && $role){
                if($pwd == $checkpwd){

                   
                    $query = $db->query("INSERT INTO users(name, lastname, nickname, email, password, diet, role)". 
                    "VALUES ('$name', '$lastname', '$nickname', '$email', '$pwd', '$diet', '$role') ") or die('Registrazione fallita'.mysqli_error($db));
                   
                    if($query){
                        $query = $db -> query("SELECT idUser FROM users WHERE nickname = '$nickname'");
                        foreach($query as $row){
                            $_SESSION['idUser'] = $row['idUser'];
                            $_SESSION['session_userRole'] = $role;
                        }
                    }
                    header('Location: Check_SignUp.php');
                }else{
                    ?><h5>Password non corrispondenti</h5><?php
                } 
            }else{
                ?><h5>Riempire tutti i campi</h5><?php
            }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registrati</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <form id="container_login" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="row g-3">
                    <div class="col-md-6">
                        <h3 class="mb-4">Inserisci i tuoi dati</h3>
                        <div class="mb-3">
                            <label for="Nome" class="form-label">Nome:</label>
                            <input type="text" name="name" class="form-control" required="required"
                                pattern="[A-Za-z]*"
                                oninvalid="this.setCustomValidity('Inserisci solo lettere maiuscole o minuscole')"
                                oninput="setCustomValidity('')">
                        </div>
                        <!-- Altri input simili -->
                        <div class="mb-3">
                            <label for="Confermapassword" class="form-label">Conferma password:</label>
                            <input type="password" name="checkpassword" class="form-control" required="required"
                                pattern="\w{5,}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Ruolo:</label>
                            <select name="role" class="form-select">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Regime alimentare:</label>
                            <select name="diet" class="form-select">
                                <option value="onnivoro">Onnivoro</option>
                                <option value="vegetariano">Vegetariano</option>
                                <option value="vegano">Vegano</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit" value="Registrati" class="btn btn-primary">
                        </div>
                        <div class="mb-3">
                            <input type="button" onclick="document.location.href='../index.php';" value="Accedi"
                                class="btn btn-secondary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

