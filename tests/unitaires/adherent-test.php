<?php

require "./vendor/autoload.php";

// Test date adhésion :
$adherant0 = new \App\Adherant('Joel', 'Lucas','ml.com', '30/09/2023');
echo $adherant0->getDateAdhesion();



// Test numéro adherant
$adherant = new \App\Adherant('joel','Lucas','kl.com');
echo $adherant->genererNumero();

