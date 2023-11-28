<?php

// upravuji nacitani stranky pomoci GET tj. co je v URL stranky
if (array_key_exists("stranka", $_GET)) {
    $stranka = $_GET["stranka"];

}else {
    $stranka = "domu";
}



// var_dump($stranka);


?>






<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cafe bar Lampičky: Vaše rodinné bistro</title>
    <link rel="icon" type="images/png" href="images/favicona.png">
    <link rel="stylesheet" href="photogalery/lightbox.min.css"> 
  <link rel="stylesheet" href="styly.css">
  <link rel="stylesheet" href="queries.css"> 
 <link rel="stylesheet" href="adress/grid.css">
 <script src="photogalery/lightbox-plus-jquery.min.js"></script>
    
    
    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
    
    <script src="sript.js"></script>
    
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
               
                <li><a href="dinneren.html"><img src="images/flagen.png"></a></li>
                <li><a href="?stranka=domu">DOMŮ</a></li>
                <li><a href="?stranka=obedy">OBĚDY</a></li>
                <li><a href="?stranka=vecere">VEČEŘE</a></li>
                <li><a href="?stranka=napoje">NÁPOJE</a></li>
                <li><a href="?stranka=catering">CATERING</a></li>
                <li><a href="?stranka=galerie">GALERIE</a></li>
                <li><a href="?stranka=kontakty">KONTAKTY</a></li>
            </ul>
            
            <div class="mobile-nav-back"></div>
                <a class="mobile-nav-icon jq--nav-icon"><img class="jq--image-hamburger" src="images/hamburgerMenu.png" alt=""></a>
         
        </nav>
      </div>
       
   <div class="header-text2">
      <h1>VEČEŘE</h1>
     
    </div>

    
    </header>
   
        <section>

            <?php
                // napojeni obsahu stranek
                echo file_get_contents("$stranka.html");




            ?>
        </section>



    <footer>
    <p>
      &copy; 2023  WebproDesign &copy; www.WebproDesign.cz
        </p>
    
    </footer>
  
</body>
</html>
