<?php

// dynamicky seznam stranek

class Stranka {
        public $id;
        public $titulek;
        public $menu;

        function __construct ($id, $titulek, $menu) {
                $this->id=$id;
                $this->titulek=$titulek;
                $this->menu=$menu;

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
    "domu" => new Stranka ("domu", "Cafe bar Lampičky: Vaše rodinné bistro", "DOMŮ"),
    "obedy" => new Stranka ("obedy", "Cafe bar Lampičky - obědy", "OBĚDY"),
    "vecere" => new Stranka ("vecere", "Cafe bar Lampičky - večeře", "VEČEŘE"),
    "napoje" => new Stranka ("napoje", "Cafe bar Lampičky - nápoje", "NÁPOJE"),
    "catering" => new Stranka ("catering", "Cafe bar Lampičky - catering", "CATERING"),
    "galerie" => new Stranka ("galerie", "Cafe bar Lampičky - galerie", "GALERIE"),
    "kontakty" => new Stranka ("kontakty", "Cafe bar Lampičky - kontakty", "KONTAKTY"),
    "404" => new Stranka ("404", "Stránka neexistuje", ""),  
];


$seznam_stranek_admin = [
        "obedy" => new Stranka ("obedy", "Cafe bar Lampičky - obědy", "OBĚDY"),
        "vecere" => new Stranka ("vecere", "Cafe bar Lampičky - večeře", "VEČEŘE"),
        "napoje" => new Stranka ("napoje", "Cafe bar Lampičky - nápoje", "NÁPOJE"),
];
