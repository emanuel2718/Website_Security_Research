<?php
    $name = $_GET['name'];
    echo "Your name is: ".remove_tags_from_name($name);

    function remove_tags_from_name($name) {
        $fixed_name = strip_tags($name);
        if (strlen($fixed_name) == 0) {
            return "ERROR PARSING NAME";
        } else {
            return $fixed_name;
        }
    }
?>