<?php session_start(); 
include "DB_Connection.php";
include "../html/head.html";
include "../html/header.html";
?>
    <body>
        <?php 
        include "../php/navbar.php";

        #migliorare html/css
        ?>
        <div id="Check-Recipe">
            <div class="container-box">
                <section id="box" class="bg-grey section-padding " >
                    <div class="container-a">
                        <div class="section-content">
                            <div class="heading-section text-center">
                                <h2>
                                    Ricetta inserita correttamente
                                </h2>
                            </div>
                            <div class="col-md-12 bg-white ridimensiona">
                                    
                                    <div class="box-text text-center ">
                                        <p class="pt-3 ">
                                            Torna alla home:
                                            <form action="../pages/Home.php" >
                                                <p><label><input type="submit" value="Home"/></label></p>
                                            </form> 
                                        </p>
                                    </div>
                            </div>                  
                        </div>
                    </div>
                </section>
                <!-- footer-section-->
                <div class="col-md-12 bg-grey text-center">
                <?php include "../html/footer.html"; ?></div>
                <!--end-footer-section-->
            </div>
            <!--end-box-->
        </div>
    </body>
</html>