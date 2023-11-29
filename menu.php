<?php

// dynamicke menu pro snadnejsi upravu

foreach ($seznam_stranek as $id_stranky => $instance_stranky) {

    if ($instance_stranky->menu != "") {

        echo "<li><a href='index.php?stranka=$instance_stranky->id'>$instance_stranky->menu</a></li>";
    }

   
}