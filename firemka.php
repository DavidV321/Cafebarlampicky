<?php

require "seznam-stranek.php";

// upravuji nacitani stranky pomoci GET 
if (array_key_exists("stranka", $_GET)) {
    $stranka = $_GET["stranka"];

    // kontrola zda li zadana stranka existuje
    if (!array_key_exists($stranka, $seznam_stranek)) {

      // stranka neexistuje
      $stranka = "404";

      // odeslat informaci i vyhledavaci ze URL neexistuje
      http_response_code(404);

    }

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
              <?php

              // vlozeni dynamickeho menu
                require "./menu.php";

              ?>
              
               
            </ul>
            
            <div class="mobile-nav-back"></div>
                <a class="mobile-nav-icon jq--nav-icon"><img class="jq--image-hamburger" src="images/hamburgerMenu.png" alt=""></a>
         
        </nav>
      </div>

    </header>
      
      
      
      <div class="header-text2">
         <h1>FIREMKY</h1>
      </div>
   
    <main>
     <section id="flexbox">
        
                 
        <div id="firemky-segment"> 
         <div class="firemky-text">
            <h2>OSLAVY A FIREMNÍ AKCE</h2>
        </div>
         
         <div class="firemky-item">
          <ul>
             <li>malé i větší dárky pro vaše partnery či zaměstnance, s brandem i bez</li>
             <li>celková kapacita 55 míst k sezení či 70 hostů při rautovém uspořádání</li>
             <li>možnost parkování v těsné blízkosti restaurace, výborná dostupnost MHD</li>
             <li>gastrokoncept s důrazem na tradici, neotřelost, rozmanitost, sezónnost, čerstvost…</li>
              
             </ul>               
         </div>
        </div>
        
          
         <div id="firemky-img">
               ><img src="images/firemka.jpg" alt="pubquiz Cafe bar Lampičky">
             </div>  
                  
        </section>
        
        <section class="firemky-main-two">
         <div class="firemky-text-two">
            <h2>Zaujala vás naše nabídka? Ozvěte se nám.</h2>
         </div>
         <div class="firemky-item-two">
            <p>+420 775 114 456</p>
            </div>
         <div class="firemky-item-three">
            <a href="mailto:info@cafebarlampicky.cz">info@cafebarlampicky.cz</a>
            </div>
        
        </section>
        
    </main>

    <footer>
      <p>
        &copy; 2023  WebproDesign &copy; www.WebproDesign.cz
          </p>
      
      </footer>
    
  </body>
  </html>
    
 