<?php
session_start();
include "../php/DB_Connection.php";
include "../php/Check_Login.php";
include "../html/header.html";
include "../html/head.html";
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
                        <p>Clicca qui per inserirne uno:
                            <input type="button" onclick="document.location.href='NewObject.php';" value="Vai all'inserimento" class="btn btn-primary mt-4">
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }

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
                            <form action="Update_Item.php" method="get">
                                <input type='hidden' name='idOggetto' value="<?= $stampa["idOggetto"] ?>">
                                <button type="submit" class="btn btn-primary">Modifica</button>
                            </form>
                            <form method="get" action="Delete_Item.php" enctype="multipart/form-data">
                                <input type='hidden' name='idItem' value='<?= $stampa["idOggetto"] ?>'>
                                <button type="submit" class="btn btn-danger">Rimuovi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </section>
</div>
<!--end-item-management-section-->
</body>
</html>
