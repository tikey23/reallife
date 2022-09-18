<form action="/index.php?page=adminSpecialEvents" method="post" enctype="multipart/form-data">
<p class='font-bold'>Neuer Spezial Abend erstellen:</p>
<table style='border:1px solid black' align='center'>
    <tr><td>Titel: </td><td><input name='specialeventtitle'></td></tr>

    <?php
    $datename = array('Datum:', 'Publik Datum:');
        for ($no=0; $no<2; $no++) {
            echo "<tr><td>" . $datename[$no] . " </td>";
                selectdate($no);
            echo "</tr>";
        }
    
    ?>
    <tr><td>Flyer: </td><td><input type='file' name='flyer'></td></tr>
    <tr><td>Text: </td><td><input name='descripttext'></td></tr>
</table>
<p><button name='createSpecialEvent'>erstellen</button>