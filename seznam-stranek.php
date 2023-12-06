<?php

// dynamicky seznam stranek

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
$seznam_stranek = [
    "domu" => new Stranka ("domu", "Cafe bar Lampičky: Vaše rodinné bistro", "DOMŮ", ""),
    "obedy" => new Stranka ("obedy", "Cafe bar Lampičky - obědy", "OBĚDY", "OBĚDY"),
    "vecere" => new Stranka ("vecere", "Cafe bar Lampičky - večeře", "VEČEŘE", "VEČEŘE"),
    "napoje" => new Stranka ("napoje", "Cafe bar Lampičky - nápoje", "NÁPOJE", "NÁPOJE"),
    "cetering" => new Stranka ("cetering", "Cafe bar Lampičky - catering", "CATERING", "CATERING"),
    "galerie" => new Stranka ("galerie", "Cafe bar Lampičky - galerie", "GALERIE", "GALERIE"),
    "kontakty" => new Stranka ("kontakty", "Cafe bar Lampičky - kontakty", "KONTAKTY", "KONTAKTY"),
//     "firemky" => new Stranka ("firemky", "Cafe bar Lampičky - firemky", ""),
    "404" => new Stranka ("404", "Stránka neexistuje", "", "404"),  
];


$seznam_stranek_admin = [
        "obedy" => new Stranka ("obedy", "Cafe bar Lampičky - obědy", "OBĚDY", "OBĚDY"),
        "vecere" => new Stranka ("vecere", "Cafe bar Lampičky - večeře", "VEČEŘE", "VEČEŘE"),
        "napoje" => new Stranka ("napoje", "Cafe bar Lampičky - nápoje", "NÁPOJE", "NÁPOJE"),
];
