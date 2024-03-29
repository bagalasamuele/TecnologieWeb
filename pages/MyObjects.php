<?php
session_start();
include "../php/DB_Connection.php";
include "../php/Check_Login.php";
include "../html/header.html";
include "../html/head.html";


// Verifica se l'utente è autenticato e ha il ruolo "admin"
if (!isset($_SESSION['idUser']) || $_SESSION['role'] !== 'admin') {
    echo '<div class="alert alert-danger container" role="alert">Solo gli amministratori possono accedere a questa pagina.</div>';
    header('refresh:3;url=../pages/home.php'); // Reindirizza alla home dopo 3 secondi
    exit();
}
?>
<body>

<!--item-management-section-->
<div class="container">
    <section>
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <h1>Ecco i tuoi oggetti</h1>
                </div>
            </div>
        </div>
        <?php
        $arr = array();
        $rows = $db->query("SELECT vintage_items.nameItem, vintage_items.imgPath, vintage_items.idItem FROM vintage_items WHERE idUser='$_SESSION[idUser]'");
        $count = mysqli_num_rows($rows);

        if ($count == 0) {
            ?>
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <h3>Non hai ancora inserito nessun oggetto.</h3>
                        <p>Clicca qui per inserirne uno:<br>
                            <input type="button" onclick="document.location.href='../php/NewObject.php';" value="Vendi" class="btn btn-primary mt-4">
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '<div class="row">';
        foreach ($rows as $row) {
            $arr[] = array(
                'nomeOggetto' => $row['nameItem'],
                'imgOggetto' => $row['imgPath'],
                'idOggetto' => $row['idItem']
            );
        }

        foreach ($arr as $stampa) {
            ?>

            <div class="col-md-4 my-2">
                <div class="card">
                    <img src="<?= $stampa["imgOggetto"] ?>" class="card-img-top" alt="<?= $stampa["nomeOggetto"] ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $stampa["nomeOggetto"] ?></h5>
                        <div class="d-flex justify-content-between">
                            <form action="../pages/Object.php" method="get">
                                <input type="hidden" name="id" value="<?= $stampa["idOggetto"] ?>">
                                <button type="submit" class="btn btn-primary">Visualizza</button>
                            </form>
                            <form method="get" action="../php/DeleteItem.php" enctype="multipart/form-data">
                                <input type='hidden' name='idItem' value='<?= $stampa["idOggetto"] ?>'>
                                <button type="submit" class="btn btn-danger">Rimuovi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div>';
        ?>
    </section>
</div>

</body>
</html>
