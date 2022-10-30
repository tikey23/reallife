<?php
    use \Rl\Models\Event;

    $events = findAll(Event::class);

    foreach($events as $event){
        $pickId = $event->id;
       
        if(isset($_POST[$pickId])){
            $availableMember = $event->availableMembers;
            if($availableMember == NULL){
                $availableMember = $_POST[$pickId];
            } else {
                $availableMember .= ":" . $_POST[$pickId];
            }
            $event->availableMembers = $availableMember;
            $event->save();
        }
    }

    echo "Deine Einsatzsdaten wurden eingetragen. Einsatzbestätigung folgt.";

    
?>