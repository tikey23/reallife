<?php
    $con = new mysqli("", "root", "", "reallife");

    $sql = "INSERT INTO gallerycategory (folder) values 
    ('Unterwasser Abend'),
    ('Cosplay Abend')
    ";
    $con ->query($sql);

    $sql = "INSERT INTO gallery (folder, dateiname) values 
    ('Unterwasser Abend', '1.jpg'),
    ('Unterwasser Abend', '2.jpg'),
    ('Unterwasser Abend', 'titel.jpg'),
    ('Unterwasser Abend', '4.jpg'),
    ('Unterwasser Abend', '5.jpg'),
    ('Cosplay Abend', 'titel.jpg'),
    ('Cosplay Abend', 'img-1869.jpg'),
    ('Cosplay Abend', 'img-1871.jpg'),
    ('Cosplay Abend', 'img-1872.jpg'),
    ('Cosplay Abend', 'img-1873.jpg'),
    ('Cosplay Abend', 'img-1876.jpg'),
    ('Cosplay Abend', 'img-1878.jpg'),
    ('Cosplay Abend', 'img-1879.jpg'),
    ('Cosplay Abend', 'img-1882.jpg'),
    ('Cosplay Abend', 'img-1885.jpg')
    ";
    $con ->query($sql);
?>
