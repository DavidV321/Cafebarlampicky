<?php

// dynamicke menu pro snadnejsi upravu

foreach ($seznam_stranek as $id_stranky => $instance_stranky) {

    if ($instance_stranky->get_menu() != "") {
        $escaped_menu = htmlspecialchars($instance_stranky->get_menu());
        $escaped_id = htmlspecialchars($instance_stranky->get_id());
        echo "<li><a href='{$escaped_id}'>{$escaped_menu}</a></li>";
        // echo "<li><a href='{$instance_stranky->get_id()}'>{$instance_stranky->get_menu()}</a></li>";
    }

   
} 