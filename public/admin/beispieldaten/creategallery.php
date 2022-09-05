<?php
    $con = new mysqli("", "root", "", "reallife");

    $sql = "INSERT INTO gallery (thema, folder, dateiname) values 
    ('Unterwasser Abend', 'unterwasser_abend', '1.jpg'),
    ('Unterwasser Abend', 'unterwasser_abend', '2.jpg'),
    ('Unterwasser Abend', 'unterwasser_abend', 'titel.jpg'),
    ('Unterwasser Abend', 'unterwasser_abend', '4.jpg'),
    ('Unterwasser Abend', 'unterwasser_abend', '5.jpg'),
    ('Cosplay Abend', 'cosplay_abend', 'titel.jpg'),
    ('Cosplay Abend', 'cosplay_abend', 'img-1869.jpg'),
    ('Cosplay Abend', 'cosplay_abend', 'img-1871.jpg'),
    ('Cosplay Abend', 'cosplay_abend', 'img-1872.jpg'),
    ('Cosplay Abend', 'cosplay_abend', 'img-1873.jpg'),
    ('Cosplay Abend', 'cosplay_abend', 'img-1876.jpg'),
    ('Cosplay Abend', 'cosplay_abend', 'img-1878.jpg'),
    ('Cosplay Abend', 'cosplay_abend', 'img-1879.jpg'),
    ('Cosplay Abend', 'cosplay_abend', 'img-1882.jpg'),
    ('Cosplay Abend', 'cosplay_abend', 'img-1885.jpg')
    ";
    $con ->query($sql);
?>
