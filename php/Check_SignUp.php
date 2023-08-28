<?php 
    #check sign up
    session_start();
    include "DB_Connection.php";
    include "../html/header.html";

    if (isset($_SESSION['idUser'])){  ?>
        <div id="check-signup">
            <div class="container-box">
                <section id="box" class="bg-grey section-padding " >
                    <div class="container-a">
                        <div class="section-content">
                            <div class="heading-section text-center">
                                <h2>
                                    Registrazione avvenuta correttamente
                                </h2>
                            </div>
                            <div class="col-md-12 bg-white ridimensiona">
                                    
                                    <div class="box-text text-center ">
                                        <p class="pt-3 ">
                                            Vai alla home:
                                            <form action="Home.php" method="get">
                                                <p><label><input type="submit" name="submit"/></label></p>  
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
        <?php
          
    }else {?>
    
    <div class="InserimentoRicetta">
            <div class="box">
                <section id="box" class="bg-grey section-padding " >
                    <div class="container-a">
                        <div class="section-content">
                            <div class="heading-section text-center">
                                <h2>
                                    Registrazione fallita
                                </h2>
                            </div>
                            <div class="col-md-12 bg-white ridimensiona">
                                    
                                    <div class="box-text text-center ">
                                        <p class="pt-3 ">
                                            Torna alla registrazione:
                                            <form action="../pages/SignUp.php" method="get">
                                                <p><label><input type="submit" name="submit"/></label></p>  
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
    <?php
    }
    exit();
?>