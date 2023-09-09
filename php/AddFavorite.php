<?php
    session_start();
include "DB_Connection.php";
include "../html/head.html";
    ?>


<!DOCTYPE html>

<body>
    <div id="Add-favorite">
        <?php
        $item = $_GET['addfavorite'];
        $rows = $db->query("SELECT favorite FROM favorites WHERE favorite ='$item' AND idUser ='$_SESSION[idUser]'");
        if ($rows->num_rows == 0) { // Item is not in the favorite table yet
            $query = $db->query("INSERT INTO favorites(idUser, favorite) VALUES ('$_SESSION[idUser]', '$item')")
                or die('Operazione non riuscita' . mysqli_error());
        } else {
            // The item is already inside the favorite table, it will remove it from favorites
            $rows = $db->query("DELETE FROM favorites WHERE favorite ='$item' AND idUser ='$_SESSION[idUser]'");
        }
        header('Location: Favorites.php');
        ?>
    </div>
</body>

