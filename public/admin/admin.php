<style>
    input
    {
        padding: 2px;
        margin: 2px;
        border-radius: 2px;
        border: 1px solid black;
    }
    input:hover
    {
        background-color: #c4b5fd; /* bg-violet-300 */
        padding: 2px;
    }

    button
    {
        padding: 2px;
        margin: 2px;
        border-radius: 2px;
        border: 1px solid black;
    }
</style>

<?php

class Korrektur
{
    function __construct(private $korrektur, private $id, private $termin){}

    function korrigieren()
    {
        $this->termin[$this->id] = $this->korrektur;

        $inhalt = serialize($this->termin);
        file_put_contents("admin/termine.dat", $inhalt);
    }

    function loschen()
    {
        unset ($this->termin[$this->id]);
        
        for($id=$this->id; $id<count($this->termin); $id++)
        {
            $newid = $id+1;
            $this->termin[$id] = $this->termin[$newid];
        }

        $inhalt = serialize($this->termin);
        file_put_contents("admin/termine.dat", $inhalt); 
    }

    
}
    echo "<form action='/index.php?page=admin' method='post'>";

    session_start();

        if(isset($_POST['kennwort']))
        {
            $_SESSION["password"] = $_POST["kennwort"];
        }

        if($_SESSION['password'] === "reallifecafe")
        {
            echo "<p>Anmeldung erfolgreich</p>";
            echo "<br>";

            
            // $termin = array("2022-10-10", "2022-11-11");

            $inhalt = file_get_contents("admin/termine.dat");
            $termin = unserialize($inhalt);

            if(isset($_POST['aktualisieren']))
            {
                $korrektur = new Korrektur($_POST['korrektur'], $_POST['aktualisieren'], $termin);
                $korrektur->korrigieren();
            }

            if(isset($_POST['loschen']))
            {
                $korrektur = new Korrektur("0", $_POST['loschen'], $termin);
                $korrektur->loschen();

            }

        
            $inhalt = file_get_contents("admin/termine.dat");
            $termin = unserialize($inhalt);

            //Neue Termine hinzufügen
            if(isset($_POST['erstellen']))
            {
                $day = $_POST['day'];
                $month = $_POST['month'];
                $year = $_POST['year'];

                $datum = $year . "-" . $month . "-" . $day;

                $termin[count($termin)] = $datum;

                $inhalt = serialize($termin);
                file_put_contents("admin/termine.dat", $inhalt);
            }

            //Eingetragene Termine anzeigen:
            
            echo "<p><b>Eingetragene Termine: (yyyy-mm-dd)</b></p>";
            echo "<table align='center'>";

            for($i=0; $i<count($termin); $i++)
            {
                if(isset($_POST['andern']))
                {
                    $id = $_POST['andern'];
                    if($i == $id)
                    {
                        // Spätere Version
                        /*echo "<tr><td>";
                        
                        //Eingabe Tag
                        echo "<p><select name='day'>";
                        for($d=1; $d<=31; $d++)
                        {
                            echo "<option value='$d'>$d</option>";
                        }
                        echo "</select>";

                        //Eingabe Monat
                        $months = array("Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");
                        echo "<select name='month'>";
                        for($m=0; $m<12; $m++)
                        {
                        echo "<option value='". $m+1 . "'>" . $months[$m] . "</option>";
                        }
                        echo "</select>";

                        //Eingabe Jahr
                        echo "<select name='year'>";
                        for($y=2022; $y<2032; $y++)
                        {
                            echo "<option value='$y'>$y</option>";
                        }
                        echo "</select>";
                        
                        echo "</td><td><button name='aktualisieren' value='$id'>aktualisieren</button></td></tr>"; */

                        echo "<tr><td><input name='korrektur' value='" . $termin[$id] . "' size='10'></td><td><button name='aktualisieren' value='$id'>aktualisieren</button></td></tr>";
                    }
                }
                echo "<tr><td>$termin[$i]</td><td><button name='andern' value='$i'>ändern</button></td><td><button name='loschen' value='$i'>löschen</button></td></tr>";
            }
            echo "</table>";
            echo "<br>";


            //Neuer Termin erfassen
            echo "<p><b>Neuer Termin erfassen:</b></p>";
            
                //Eingabe Tag
                echo "<p><select name='day'>";
                for($d=1; $d<=31; $d++)
                {
                    echo "<option value='$d'>$d</option>";
                }
                echo "</select>";

                //Eingabe Monat
                $months = array("Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");
                echo "<select name='month'>";
                for($m=0; $m<12; $m++)
                {
                echo "<option value='". $m+1 . "'>" . $months[$m] . "</option>";
                }
                echo "</select>";

                //Eingabe Jahr
                echo "<select name='year'>";
                for($y=2022; $y<2032; $y++)
                {
                    echo "<option value='$y'>$y</option>";
                }
                echo "</select>";
                echo "</p>";

                //echo "<p><b><input type='submit' value='Absenden'></b></p>";
                echo "<p><b><button name='erstellen'>Absenden</button></b></p>";
                echo "</form>";
        }
        else
        {
            echo "<p>Fehlgeschlagen</p>";
        }
?>