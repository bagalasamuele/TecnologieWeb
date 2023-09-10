<?php
session_start();
include "DB_Connection.php";
include "../html/head.html";
include "../html/header.html";
header("refresh:2;url=../pages/Home.php");
?>

<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Oggetto inserito correttamente</h2>
            </div>
            <div class="col-md-12">
                <p>Torna alla home:</p>
                <form action="../pages/Home.php">
                    <label><input type="submit" class="btn btn-primary" value="Home" /></label>
                </form>
            </div>
        </div>
    </div>
</section>

<div>
    <?php include "../html/footer.html"; ?>
</div>

</body>

</html>
