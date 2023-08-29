<?php
    session_start();
    include "DB_Connection.php";
    include "Check_Login.php";
    include "../php/navbar.php";
?>  
    <body>
    <?php
    include "../html/header.html";
    ?>    
        <!--Box-section-->
        <div class="container-box">
            <section id="box" class="bg-grey section-padding " >
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
                            $i=01;
                            if ($rows->num_rows ==0)
                            { ?>
                                <div class="col-md-12 bg-white ridimensiona">
                                    <div class="box-text ">
                                        <p class="pt-3 text-center">
                                            La ricerca non ha avuto risultati
                                        </p>
                                    </div> 
                            </div>
                            <?php
                            }  
                           
                            foreach($rows as $row){   
                        ?>
                            <div class="col-md-12 bg-white ridimensiona">
                                    <h2 class="special-number "><?=$i?>.</h2>
                                    <div class="box-text ">
                                        <p class="pt-3 ">
                                        <form action="Recipe.php">
                                                <p><label><input type="submit" name="nome" value="<?= $row["nameRecipe"]?>" /></label></p>  
                                            </form> 
                                        </p>
                                    </div>      
                                <br><br><br><br><br><br><br>
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
            <?php include "../html/footer.html"; ?></div>
            <!--end-footer-section-->
        </div>
        <!--end-box-section-->
</html>