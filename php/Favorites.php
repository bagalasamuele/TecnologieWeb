<?php
session_start();
include "DB_Connection.php";
include "../html/head.html";
include "../html/header.html";
?>

<body>
    <div class="container">
        <section>
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <h1>La tua lista desideri</h1>
                    </div>
                </div>
            </div>

            <?php
            $test = 0;

            $arr = array();
            $queryR = "SELECT vintage_items.nameItem, vintage_items.imgPath FROM vintage_items INNER JOIN favorites ON vintage_items.idItem = favorites.favorite INNER JOIN users ON favorites.idUser = users.idUser WHERE users.idUser='$_SESSION[idUser]' ORDER BY vintage_items.nameItem";
            $rows = $db->query($queryR);

            $count = mysqli_num_rows($rows);

            if ($count == 0) {
            ?>
                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            <h3>Non hai ancora inserito nessun oggetto tra i preferiti.</h3>
                            <p>Torna indietro per aggiungerne alcuni:
                                <input type="button" onclick="document.location.href='Home.php';" value="Home" class="btn btn-primary"></p>
                        </div>
                    </div>
                </div>
            <?php
            }

            echo '<div class="row">';

            foreach ($rows as $row) {
                $arr[] = array(
                    'nomeOggetto' => $row['nameItem'],
                    'imgOggetto' => $row['imgPath']
                );
            }

            foreach ($arr as $stampa) {
            ?>
                <div class="col-md-4 my-2">
                    <div class="card">
                        <img src="<?= $stampa["imgOggetto"] ?>" class="card-img-top" alt="<?= $stampa["nomeOggetto"] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $stampa["nomeOggetto"] ?></h5>
                            <form action="Object.php" method="get">
                                <button type="submit" class="btn btn-primary" name="id" value="<?= $stampa["nomeOggetto"] ?>">Vai al tuo oggetto</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                $test++;
            }
            echo '</div>';
            ?>
        </section>
    </div>
</body>
</html>
