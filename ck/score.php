<?php

function ReadDb() {
    $link = mysqli_connect("localhost","leader","6010230500", 'ck');
    $rlt = mysqli_query($link, "SELECT * FROM score");
    echo "test";
    while ($d = mysqli_fetch_object($rlt)) {
        print_r($d);   echo "<BR>";
    }
}
ReadDb();
?>