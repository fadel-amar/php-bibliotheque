<?php

require "./vendor/autoload.php";

// Test date adhésion non précisée :
// Le test doit renvoyer la date du jour
$adherantTestNotPrecise = new \App\Adherant('Joel', 'Lucas', 'ml.com');
if ($adherantTestNotPrecise->getDateAdhesion() == (new \DateTime())->format('d/m/Y')) {
    echo "La date d'adhésion est correcte : " . $adherantTestNotPrecise->getDateAdhesion();
} else {
    echo "Erreur la date ne correspond pas à la date du jour";
}

echo "\n-------------------------------\n";
// Test date prise en compote lors de la création d'un adhérant
$date = '25/09/2023';
$adherantTestDateCreation = new \App\Adherant('Louis', 'Marchal', 'kolo.com', $date);
if ($adherantTestDateCreation->getDateAdhesion() == $date) {
    echo "La date a bien été prise en compte : {$adherantTestDateCreation->getDateAdhesion() }";
} else {
    echo "Erreur";
}


echo "\n-------------------------------\n";
// Test validité Numéro adherant
$adherantTestNumero = new \App\Adherant('Tintin', 'Nicol', 'tn.com');
$numeroAdherant = $adherantTestNumero->getNumeroAdherant();
$pattern = '/^AD-\d{6}$/';
if (preg_match($pattern, $numeroAdherant)) {
    echo "Le numéro adhérent est valide : $numeroAdherant";
} else {
    echo "Le numéro adhérent n'est pas valide : $numeroAdherant";
}


echo "\n-----------True--------------------\n";
// Test validité d'une adhésion
$adherantValliditeAdhesion = new \App\Adherant('Capri', 'Sun', 'sm@gmailc.com', '06/06/2022');
if ($adherantValliditeAdhesion->AdhesionValable()) {
    echo "L'adhésion est toujours valable";
} else {
    echo "L'adhésion n'est plus valable";
}

echo "\n--------TEST FALSE--------\n";
// Test validité une adhésion
$adherantValliditeAdhesion05 = new \App\Adherant('Joul', 'Kun', 'jk@gmailc.com', '06/06/2023');
if ($adherantValliditeAdhesion05->AdhesionValable()) {
    echo "L'adhésion est toujours valable";
} else {
    echo "L'adhésion n'est plus valable";
}


echo "\n-------------------------------\n";
// Test Renouvellement adhésion
$renouvelerAdherant = new \App\Adherant('Lop','Mig','ggMIUK','06/05/2023');
$renouvelerAdherant->RenouvelerAdhesion();
echo $renouvelerAdherant->getDateAdhesion();

