<?php

require "seznam-stranek.php";

$lang = "cs"; // Defaultní jazyk, může být změněn v URL parametru

if (array_key_exists("lang", $_GET) && ($_GET["lang"] == "en")) {
    $lang = "en"; // Pokud je v URL parametru zvolen anglický jazyk, použije se
}

// upravuji nacitani stranky pomoci GET 
if (array_key_exists("id-stranky", $_GET)) {
  $id_stranky = $_GET["id-stranky"];

    // // kontrola zda li zadana stranka existuje
    // if (!array_key_exists($id_stranky, $seznam_stranek)) {

    //   // stranka neexistuje
    //   $id_stranky = "404";

    //   // odeslat informaci i vyhledavaci ze URL neexistuje
    //   http_response_code(404);

    // }

}else {
  $id_stranky = "domu";
}

$menu = $pole_stranek[$lang]; // Vybere správný jazykový menu


?>



<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo  $menu[$id_stranky]->get_titulek(); ?> </title>
    <link rel="icon" type="images/png" href="images/favicona.png">
    <link rel="stylesheet" href="photogalery/lightbox.min.css"> 
  <link rel="stylesheet" href="styly.css">
  <link rel="stylesheet" href="styly-menu.css">
  <link rel="stylesheet" href="queries.css"> 
 <link rel="stylesheet" href="adress/grid.css">
 <script src="photogalery/lightbox-plus-jquery.min.js"></script>
    
    
    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
    
    <script src="script.js"></script>
    
</head>

<body>
  <header>
      <div class="nav-backround">
      
      </div>
    
      <div class="nav-bar row">
        <div id="logo">
         <img src="images/logolampy2.png">
        </div>
    <div class="facebook">
        <a href="https://www.facebook.com/cafelampicky/" target="_blank"><img src="images/fcb.png"></a>
          </div> 
    <div class="instagram">
          <a href="https:/www.instagram.com/cafebar_lampicky/" target="_blank"><img src="images/inst.png"></a>
          </div>
     
        <nav>
            <ul>
                <?php
                foreach ($menu as $stranka => $instance_stranky) {
                  if ($instance_stranky->get_menu() != "") {
                      $escaped_menu = htmlspecialchars($instance_stranky->get_menu());
                      $escaped_id = htmlspecialchars($stranka);
                      echo "<li><a href='?lang={$lang}&id-stranky={$escaped_id}'>{$escaped_menu}</a></li>";
                  }
              }

              ?>
               <!-- Přepínač jazyků -->
               <?php
                if ($lang === "cs") {
                    echo "<li><a href='?lang=en&id-stranky={$id_stranky}'>EN</a></li>";
                } else {
                    echo "<li><a href='?lang=cs&id-stranky={$id_stranky}'>CZE</a></li>";
                }
                ?>
               
            </ul>
            
            <div class="mobile-nav-back"></div>
                <a class="mobile-nav-icon jq--nav-icon"><img class="jq--image-hamburger" src="images/hamburgerMenu.png" alt=""></a>
         
        </nav>
      </div>
      <div class="header-text2">
        <h1><?php echo $menu[$id_stranky]->get_nadpis(); ?></h1>
      </div>
   
    </header>
   
        <section>

            <?php
                // napojeni obsahu stranek
             
               echo $menu[$id_stranky]->get_obsah();
                // echo file_get_contents("$stranka.html");



            ?>
        </section>



    <footer>
      <p>
        &copy; 2023  WebproDesign &copy; www.WebproDesign.cz
      </p>
    

      <!-- <div class="scrollup-icon jq--scroll-header-text">
        <img src="images/scrollup.png">
      </div>  -->
    </footer>
    
</body>
</html>
