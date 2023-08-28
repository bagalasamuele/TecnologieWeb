<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div id="login" class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <form action="index.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Email address</label>
                                <input type="input" class="form-control" id="inputEmail" placeholder="Enter email" id="username" name="nickname" required="required" pattern="\w*" oninvalid="setCustomValidity('Inserisci solo lettere e/o numeri')" oninput="setCustomValidity('')">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password" id="password" name="password" required="required">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="submit" value="Accedi">Login</button>
                            </div>

                            <div >
                            <p><input type="button" onclick="document.location.href='./pages/SignUp.php';" value="Registrati" class="reg"></p>
                        </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <?php
            session_start();
            include "php/DB_Connection.php";
            if(isset($_POST['submit'])){ //se il bottone e' stato premuto
                # htmlspecialchars: PHP function allows you to prevent XSS-type attacks 
                # by converting any HTML tags present in the string 
                # (the username comes from a user input entered in the registration form).
                $nickname = htmlspecialchars($_POST["nickname"]);
                $password = htmlspecialchars($_POST["password"]);

                if($nickname && $password){
                        $nickname = strip_tags($nickname);
                        $nickname = $db->real_escape_string($nickname);
                        $password = strip_tags($password); 
                        $password = $db->real_escape_string($password);
                        $password = md5($password);
                        $query = $db->query("SELECT idUser, nickname, role FROM users WHERE nickname='$nickname' AND password='$password'");
                        if($query->num_rows ==1){
                            while($row = $query->fetch_object()){
                                    $user_role = $row->role;
                                    
                                    # now I check that the user is a normal user or an admin user
                                    if ($user_role === 'admin') {
                                        $admin_request = true;
                                    }
                                    
                                    session_regenerate_id();
                                    $_SESSION['idUser'] = $row->idUser;
                                    $_SESSION['session_userRole'] = $user_role;

                                }
                                header('Location: pages/Home.php');
                                exit();
                            }else{
                                ?><h5>Nickame o password errati</h5><?php
                            }
                    }else{
                    ?><h5>Riempire tutti i campi!</h5><?php
                    }
            }
        ?>
         
</body>

</html>