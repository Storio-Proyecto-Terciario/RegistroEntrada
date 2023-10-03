<?php

$multidimensionalArray = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

foreach ($multidimensionalArray as $row) {
    foreach ($row as $value) {
        echo $value . " ";
    }
    echo "<br>";
}