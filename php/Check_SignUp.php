<?php
session_start();
include "DB_Connection.php";
include "../html/head.html";
?>

<?php
if (isset($_SESSION['idUser'])) {
?>

    <section class='container'>
    <div class='row justify-content-center align-items-center mt-5'>
        <h2>Registrazione avvenuta correttamente</h2>
        <div>
            <p>Vai alla home:</p>
       <form action="../pages/Home.php" method="get">
           <input type="submit" class="btn btn-primary" value="Home" />
       </form>

        </div>
    </div>

    </section>

<?php
} else {
?>

    <div>
        <section class='container'>
            <h2>Registrazione fallita</h2>
            <div>
                <p>Torna alla registrazione:</p>
                <form action="../pages/SignUp.php" method="get">
                    <input type="submit"  class="btn btn-primary" value="Back"/>
                </form>
            </div>
        </section>
    </div>

<?php
}
?>

<?php include "../html/footer.html"; ?>
</body>
</html>
