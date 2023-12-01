<?php

// dynamicke menu pro snadnejsi upravu

foreach ($seznam_stranek as $id_stranky => $instance_stranky) {

    if ($instance_stranky->get_menu() != "") {

        echo "<li><a href='{$instance_stranky->get_id()}'>{$instance_stranky->get_menu()}</a></li>";
    }

   
}