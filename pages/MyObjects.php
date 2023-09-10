<?php
session_start();
include "../php/DB_Connection.php";
include "../php/Check_Login.php";
include "../html/header.html";
include "../html/head.html";
?>
<body>

<!--item-management-section-->
<div>
    <section>
        <div>
            <h2>
                Ecco i tuoi oggetti:
            </h2>
        </div>
        <?php
            $arr = array();
            $rows = $db->query("SELECT vintage_items.nameItem, vintage_items.imgPath, vintage_items.idItem FROM vintage_items WHERE idUser='$_SESSION[idUser]'");

            $count = mysqli_num_rows($rows);

            if ($count == 0) {
        ?>
            <div>
                <div>
                    <h3>Non hai ancora inserito nessun oggetto.</h3>
                    <p>Clicca qui per inserirne uno:
                    <input type="button" onclick="document.location.href='New_Item.php';" value="Vai all'inserimento"></p>
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
                <div>
                    <h3><span><?= $stampa["nomeOggetto"] ?></span></h3>
                    <div>
                        <div>
                            <img id="<?= $stampa["nomeOggetto"] ?>" src='<?= $stampa["imgOggetto"] ?>' onMouseOver='zoomIn(this.id,"300","300");' onMouseOut='restore(this.id,"200","200");'>
                        </div>
                        <p>
                            <form action="Update_Item.php" method="get">
                                <input type='hidden' name='idOggetto' value="<?= $stampa["idOggetto"] ?>">
                                <p>Vai al tuo oggetto:<br><label><input type="submit" name="submit" value="Visualizza"></label></p>
                            </form>
                        </p>
                        <p>
                            <form method="get" action="Delete_Item.php" enctype="multipart/form-data">
                                <input type='hidden' name='idItem' value='<?= $stampa["idOggetto"] ?>'>
                                Vuoi eliminare il tuo oggetto?<input type="submit" name="submit" value="Elimina" />
                            </form>
                        </p>
                    </div>
                </div>
        <?php
            }
        ?>
        <div>
            <p>
                <form action="Manage_Items.php" method="get">
                    <?php
                        for ($j = 1; $count > 0; $j += 1, $count -= 3) {
                    ?>
                        <input type="submit" name="n_pag" value="<?= $j ?>" />
                    <?php
                        }
                    ?>
                </form>
            </p>
        </div>
    </section>
</div>
<!--end-item-management-section-->
</body>
</html>
