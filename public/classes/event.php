<?php
class Event
{
        function __construct(private $korrektur, private $id, private $termin) {
        }
    
        function korrigieren() {
            $this->termin[$this->id] = $this->korrektur;
    
            $inhalt = serialize($this->termin);
            file_put_contents("admin/termine.dat", $inhalt);
        }
    
        function loschen() // Noch Fehlerhaft -> Im Bearbeitung
        {
            unset ($this->termin[$this->id]);
    
            $j = 0;
            for ($i = 0; $i < count($this->termin); $i++) {
                if (isset($this->termin[$j])) {
                    $newtermin[$i] = $this->termin[$j];
                    $j++;
                } else {
                    $newtermin[$i] = $this->termin[$j + 1];
                    $j++;
                }
            }
    
            $inhalt = serialize($newtermin);
            file_put_contents("admin/termine.dat", $inhalt);
        }
}
?>