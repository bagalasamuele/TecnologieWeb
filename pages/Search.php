<?php include "../html/head.html"; ?>
<?php include "../html/header.html"; ?>

<?php
session_start();
include "../php/DB_Connection.php";
include "../php/Check_Login.php";
?>


<section class="container">
    <div class="container-a">
        <div class="section-content">
            <div class="heading-section text-center">
                <h2>
                    Ecco i risultati della tua ricerca:
                </h2>
            </div>
            <?php
            $nomeR = $_GET["nomeR"];
            $rows = $db->query("SELECT idItem, nameItem FROM vintage_items WHERE nameItem LIKE '%" . $nomeR . "%'");
            $i = 1;

            if ($rows->num_rows === 0) {
                echo '<div class="col-md-12 bg-white">
                <div class="box-text">
                    <p class="pt-3 text-center">La ricerca non ha avuto risultati</p>
                </div>
            </div>';
            } else {
                foreach ($rows as $row) {
                    ?>
                    <div class="col-md-12 bg-white my-2">
                        <div class="d-flex flex-row align-items-center">
                            <h2 class="special-number">
                                <?= $i ?>.
                            </h2>
                            <form action="Object.php" method="get" class="d-inline">
                                <input type="hidden" name="id" value="<?= $row["idItem"] ?>">
                                <button type="submit" class="btn btn-link">
                                    <?= $row["nameItem"] ?>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
            }
            ?>


        </div>
    </div>
</section>

<!-- footer-section-->
<div class="col-md-12 bg-grey text-center">
    <?php include "../html/footer.html"; ?>
</div>
<!--end-footer-section-->