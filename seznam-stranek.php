<?php

class Stranka {
        private $id;
        private $titulek;
        private $menu;
        private $nadpis;

        function __construct ($id, $titulek, $menu, $nadpis) {
                $this->id=$id;
                $this->titulek=$titulek;
                $this->menu=$menu;
                $this->nadpis=$nadpis;

        }

        function get_id(){
                return $this->id;
        }

        function get_titulek(){
                return $this->titulek;
        }

        function get_menu(){
                return $this->menu;
        }

        function get_nadpis(){
                return $this->nadpis;
        }



        // funkce pro volani obsahu do administracniho formulare
        function get_obsah () {
                return file_get_contents ("$this->id.html");
        }

        // funkce pro ulozeni editovaneho obsahu
        function set_obsah($obsah){
                file_put_contents("$this->id.html", $obsah);
        }

} // ...... end class Stranka ...........


// pole stranek 
$pole_stranek = array (
        'cs' => array (
                "domu" => new Stranka ("domu", "Cafe bar Lampičky: Vaše rodinné bistro", "DOMŮ", ""),
                "obedy" => new Stranka ("obedy", "Cafe bar Lampičky - obědy", "OBĚDY", "OBĚDY"),
                "vecere" => new Stranka ("vecere", "Cafe bar Lampičky - večeře", "VEČEŘE", "VEČEŘE"),
                "napoje" => new Stranka ("napoje", "Cafe bar Lampičky - nápoje", "NÁPOJE", "NÁPOJE"),
                "cetering" => new Stranka ("cetering", "Cafe bar Lampičky - catering", "CATERING", "CATERING"),
                "galerie" => new Stranka ("galerie", "Cafe bar Lampičky - galerie", "GALERIE", "GALERIE"),
                "kontakty" => new Stranka ("kontakty", "Cafe bar Lampičky - kontakty", "KONTAKTY", "KONTAKTY"),
                "firemka" => new Stranka ("firemka", "Cafe bar Lampičky - firemky", "", "FIREMKY"),
                "404" => new Stranka ("404", "Stránka neexistuje", "", "404"),  
        ),

        'en' => array (
                "domu" => new Stranka ("home", "Cafe bar Lampičky: Your family bistro", "HOME", ""),
                "obedy" => new Stranka ("lunch", "Cafe bar Lampičky - lunch", "LUNCH", "LUNCH"),
                "vecere" => new Stranka ("dinner", "Cafe bar Lampičky - dinner", "DINNER", "DINNER"),
                "napoje" => new Stranka ("drink", "Cafe bar Lampičky - drinks", "DRINKS", "DRINKS"),
                "cetering" => new Stranka ("ceteringen", "Cafe bar Lampičky - catering", "CATERING", "CATERING"),
                "galerie" => new Stranka ("gallery", "Cafe bar Lampičky - gallery", "GALLERY", "GALLERY"),
                "kontakty" => new Stranka ("contacts", "Cafe bar Lampičky - contacts", "CONTACTS", "CONTACTS"),
                "firemka" => new Stranka ("event", "Cafe bar Lampičky - event", "", "EVENTS"),
                "404" => new Stranka ("404", "Stránka neexistuje", "", "404"),  
        )

        );
   



$seznam_stranek_admin = [
        "obedy" => new Stranka ("obedy", "Cafe bar Lampičky - obědy", "OBĚDY", "OBĚDY"),
        "vecere" => new Stranka ("vecere", "Cafe bar Lampičky - večeře", "VEČEŘE", "VEČEŘE"),
        "napoje" => new Stranka ("napoje", "Cafe bar Lampičky - nápoje", "NÁPOJE", "NÁPOJE"),
      
        
];

