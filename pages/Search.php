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
            $rows = $db->query("SELECT nameRecipe FROM recipe WHERE (nameRecipe LIKE '%" . $nomeR . "%')");
            $i = 01;
            if ($rows->num_rows == 0) { ?>
                <div class="col-md-12 bg-white ">
                    <div class="box-text ">
                        <p class="pt-3 text-center">
                            La ricerca non ha avuto risultati
                        </p>
                    </div>
                </div>
                <?php
            }

            foreach ($rows as $row) {
                ?>
                <div class="col-md-12 bg-white my-2 d-flex flex-row">
                    <h2 class="special-number">
                        <?= $i ?>.
                    </h2>
                    <div class="box-text ">
                        <form action="Recipe.php">
                            <input type="submit" name="nome" value="<?= $row["nameRecipe"] ?>" />
                        </form>
                    </div>
                </div>

                <?php
                $i++;

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