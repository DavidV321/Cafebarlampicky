<?php
    require "./seznam-stranek.php";

    // nastartovani sessiony pro zapamatovani ukonu
session_start();
$chyba = "";


// zpracovani formulare
if (array_key_exists("prihlasit", $_POST)) {

    $jmeno = $_POST["jmeno"];
    $heslo = $_POST["heslo"];

    // nastaveni pevneho prihlasovaciho jmena a hesla
    if ($jmeno == "admin" && $heslo == "pokus123"){

    // pri zadani platnehych udaju
    $_SESSION["prihlaseny_uzivatel"] = $jmeno;



}else {
    // pri zadani spatnehych udaju
    $chyba = "Nesprávné přihlašovací údaje";

}

}


// zpracovani pro odhlasovani z formulare
if (array_key_exists("odhlasit", $_POST)) {


    unset ($_SESSION["prihlaseny_uzivatel"]);
    header ("Location: ?");
    exit;
}

// zpracovani v administraci pouze pro prihlasene uzivatele 
if (array_key_exists("prihlaseny_uzivatel", $_SESSION)) {

    // promenna predstavujici stranku kterou zrovna editujeme
    $instance_aktualni_stranky = null;


    // zpracovani vyberu aktualni stranky
    if (array_key_exists("id-stranky", $_GET)) {

        $id_stranky = $_GET["id-stranky"];
        $instance_aktualni_stranky = $seznam_stranek_admin[$id_stranky];
    }

    // zpracovani editacniho formulare pro ulozeni 
    if (array_key_exists("ulozit", $_POST)) {

        $obsah = $_POST["obsah"];
        $instance_aktualni_stranky->set_obsah($obsah);
    }
}

// var_dump ($instance_aktualni_stranky);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrace</title>
    <link rel="stylesheet" href="styly-admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</head>
<body>

        <?php
            if (!array_key_exists("prihlaseny_uzivatel", $_SESSION)) {

                // ======= sekce pro neprihlasene uzivatele =======
                ?>
                <main class="form-signin w-100 m-auto">
                    <form method="post" >
                        <h1 class="h3 mb-3 fw-normal">Přihlašte se prosím</h1>

                        <?php
                        if ($chyba != "") { ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $chyba; ?>
                        </div>
                        <?php } ?>     

                        <div class="form-floating">
                            <input name="jmeno" type="text" class="form-control" id="floatingInput" placeholder="login">
                            <label for="floatingInput">Přihlašovací jméno</label>
                        </div>

                        <div class="form-floating">
                            <input name="heslo" type="password" class="form-control" id="floatingPassword" placeholder="Heslo">
                            <label for="floatingPassword">Heslo</label>
                        </div>

                        </div>
                        <button name="prihlasit" class="btn btn-primary w-100 py-2" type="submit">Přihlásit</button>
                    
                    </form>
                </main>


        <!-- 
            <form action="" method="post">
                <label for="jmeno">Přihlašovací jméno</label>
                <input type="text" name="jmeno" id="jmeno">
                <br>
                <label for="heslo">Heslo</label>
                <input type="password" name="heslo" id="heslo">
                <br>
                <button name="prihlasit">Přihlásit</button>

            </form> -->


            <?php 
           


                
        }else  {

            ?>
        
        <div class="admin">
        
            <div class="container">
                <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                    <div>Přihlášený uživatel: <?php echo $_SESSION ["prihlaseny_uzivatel"]?></div>

                    <div class="col-md-3 text-end">
                        <form method='post'>
                            <button name='odhlasit' class="btn btn-primary">Odhlásit se</button>
                        </form>
                    </div>
                </header>
            </div>

            <?php
        // =====   sekce pro prihlasene uzivatele =======
        // vypiseme kdo je prihlasen
        // echo "Přihlášený uživatel: {$_SESSION ["prihlaseny_uzivatel"]}";

        // tlacitko pro odhlaseni
        // echo "<form method='post'>
        //         <button name='odhlasit'>Odhlásit se</button>
        //     </form>";
        
        // seznam stranek ktere budeme editovat
        echo "<ul id='stranky' class='list-group'>";

        foreach ($seznam_stranek_admin as $id_stranky => $instance_stranky) {

            $active = '';
            $button_class = 'btn-primary';
                if ($instance_stranky == $instance_aktualni_stranky) {

                    $active = "active";
                    $button_class = 'btn-secondary';
                }

            echo "<li class='list-group-item $active'>
             <a class='btn $button_class' href='?id=stranky={$instance_stranky->get_id()}'>editovat</a>
             <a class='btn $button_class' href='{$instance_stranky->get_id()}' target='_blank'>zobrazit</a>

            <span>{$instance_stranky->get_id()}</span>
            </li>";
        }

            echo "</ul>";


        // editacni formular
        // zobrazit pokud je nejaka stranka vybrana k editaci
            if ($instance_aktualni_stranky != null) {

                echo "<div class='alert alert-secondary' role='alert'>
                  <h1>Editace stránky: {$instance_aktualni_stranky->get_id()}</h1></div> ";
                ?>
        </div>
                    <form action="" method="post">
                        <textarea name="obsah" id="obsah" cols="150" rows="30"><?php
                        echo htmlspecialchars ($instance_aktualni_stranky->get_obsah());
                        ?></textarea>
                        <br>
                     <div class="admin"> 
                        <button class="btn btn-primary" name="ulozit">Uložit</button>
                    </div>  
                    </form>
                    <!-- pripojeni scriptu tinymce pro prehlednejsi editovani -->
                    <script src="vendor/tinymce/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
                <!-- prilepime ten obsah do textarea pres id textarey a uprava do cs jazyka-->
                <script>
                        tinymce.init({
                        selector: '#obsah',      
                        language: 'cs',
                        language_url: '<?php echo dirname($_SERVER["PHP_SELF"]); ?>/vendor/tweeb/tinymce-i18n/langs/cs.js',
                        height: '50vh',
                        entity_encoding: "raw",
                        content_css: ["./styly.css", "./styly-menu.css"],
                        cleanup: false,
                        verify_html: false,
                        plugins: ["code", "image", "responsivefilemanager", "anchor", "autolink", "autoresize", "link", "media", "lists", "advlist", "colorpicker", "contextmenu", "fullscreen"],
                        toolbar1: 'formatselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
                        toolbar2: "| responsivefilemanager | link | image media | forecolor backcolor  | print preview code ",
                        external_plugins: {
                        'responsivefilemanager': '<?php echo dirname($_SERVER['PHP_SELF']); ?>/vendor/primakurzy/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
                        },
                        external_filemanager_path: "<?php echo dirname($_SERVER['PHP_SELF']); ?>/vendor/primakurzy/responsivefilemanager/filemanager/",
                        filemanager_title: "File manager",
                        });
                    </script>
                    <!--  echo dirname ($_SERVER["PHP_SELF"]); tento zapis nam dohleda slozku v ceste a doplni ji -->
                <?php

            }

        }
            ?>

  

    
</body>
</html>