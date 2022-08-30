<?php
//Declare the array
$flowers = array(
                "Rose",
                "Lili",
                "Jasmine",
                "Hibiscus",
                "Tulip",
                "Sun Flower",
                "Daffodil",
                "Daisy");

unset($flowers[1]);
echo "The array is:\n";
print_r($flowers);
?>