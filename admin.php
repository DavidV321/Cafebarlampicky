<?php
    //nastartujeme session pro prihalsovani a odhlasovani
session_start();


// login formulare
if (isset($_post["login-submit"])) {
        $prihlasovaci_jmeno = $_POST ["jmeno"];
        $prihlasovaci_heslo = $_POST ["heslo"];

        if ($prihlasovaci_jmeno === "admin" && $prihlasovaci_heslo === "pokus123") {
                $_SESSION["Jste_prihlasen"] = true;
        };
}

// logout formulare

if (isset($_GET["logout-submit"])) {
    unset($_SESSION["Jste_prihlasen"]);
    header("location: ?");
    exit;
}


// kontrola prihlaseni
// if(array_key_exist("Jste_prihlaseni", $_SESSION))

?>






<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrace-Lampičky</title>
    <link rel="icon" type="images/png" href="images/favicona.png">
    <link rel="stylesheet" href="styly-admin.css">
</head>
<body>
    <header>

    <div class="logo">
        <img src="images/logolampy2.png" alt="logo">
    </div>

    <div class="title">
        <h2>PŘIHLÁŠENÍ DO ADMINISTRACE</h2>
    </div>

        <div class="box">
            <div class="form">
                <?php
                if(!isset($_SESSION["Jste_prihlasen"])) {
                    require_once "./prihlasovaci-formular.php";
                    
                }else {
                    echo "<a href='?logout-submit'>Odhlásit se</a>";
                    require_once "./editor-stranek.php";

                }
                
                ?>
            </div>
        </div>

        <?php 
        
        
        
        
        ?>

    </header>

  
</body>
</html>