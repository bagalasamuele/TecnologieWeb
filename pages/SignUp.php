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
<meta charset="UTF-8">
<html>
    <head>
        <link href="../css/login.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <div class="InserimentoDati">
            <form id ="container_login" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" >
                <h3>Inserisci i tuoi dati</h3>
                <p><label for="Nome">Nome: </label>
                <input type="text" name="name" required="required" pattern="[A-Za-z]*" oninvalid="this.setCustomValidity('Inserisci solo lettere maiuscole o minuscole')" oninput="setCustomValidity('')"/></p>
                <p><label for="Cognome">Cognome: </label>
                <input type="text" name="lastname" required="required" pattern="[A-Za-z]*" oninvalid="setCustomValidity('Inserisci solo lettere maiuscole o minuscole')" oninput="setCustomValidity('')"/></p>
                <p><label for="Nickname">Nickname: </label>
                <input type="text" name="nickname" required="required" pattern="\w*" oninvalid="setCustomValidity('Inserisci lettere e/o numeri')" oninput="setCustomValidity('')"/></p>
                <p><label for="Email">E-mail: </label>
                <input type="email" name="email" required="required"/></p>
                <p><label for="Password">Password: </label>
                <input type="password" name="pwd" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninvalid="setCustomValidity('Inserisci almeno 8 caratteri, una lettera minuscola, una maiuscola, un numero')" oninput="setCustomValidity('')"/></p>
                <p><label for="Confermapassword">Conferma password: </label>
                <input type="password" name="checkpassword" required="required" pattern="\w{5,}" /></p>
                <p>
                    Ruolo: <select name="role" class="select">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                </p>
                <p>
                    Regime alimentare: <select name="diet" class="select">
                            <option value="onnivoro">Onnivoro</option>
                            <option value="vegetariano">Vegetariano</option>
                            <option value="vegano">Vegano</option>
                        </select>
                </p>
                <p><input type="submit" name="submit" value="Registrati" class="reg" /></p>
                <p><input type="button" onclick="document.location.href='Index.php';" value="Accedi" class="log"></p>
            </form>
        </div>
    </body>
</html>