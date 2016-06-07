<?php


$link = @mysqli_connect("192.168.1.51", "eddySoft", "eddy$1511", "eddylists") or die("500");	 
echo "100";

    function utf8ize($d) {
        if (is_array($d)) {
            foreach ($d as $k => $v) {
                $d[$k] = utf8ize($v);
            }
        } else if (is_string ($d)) {
            return utf8_encode($d);
        }
        return $d;
    }

?>