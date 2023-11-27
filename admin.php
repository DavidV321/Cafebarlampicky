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
                require_once "./prihlasovaci-formular.php";
                ?>
            </div>
        </div>



    </header>

  
</body>
</html>