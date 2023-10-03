<?php
require "./vendor/autoload.php";
require "./tests/utils/couleurs.php";

$livre = new \App\Livre('456-465', 'Koul', 'Jouets du K', 75);
$bluray = new \App\BluRay('Le film', 'babouche', '1960', 170);
$adherant = new \App\Adherant('Louis', 'Marchal', 'kolo.com');
$emprunt = new \App\Emprunt($livre, $adherant);
$dateRetourEstime = $emprunt->getDateRetourEstime();
$dateEmprunt = $emprunt->getDateEmprunt();


echo "-Test date emprunt = date du jour\n";
if ($dateEmprunt == (new \DateTime())->format('d/m/Y')) {
    echo GREEN."  Test valide : " . $dateEmprunt, RESET;
} else {
    echo RED_BACKGROUND ."Erreur" . $dateEmprunt, RESET;
}

echo "\n --------------------\n";

echo "-Test date retour estimé livre (+21 duree emprunt)\n";
if ($dateRetourEstime == (new \DateTime())->add(new \DateInterval("P21D"))->format("d/m/Y")) {
    echo   GREEN . "La date correspond date jour +21 : " . $dateRetourEstime, RESET;
} else {
    echo RED_BACKGROUND ."La date ne correspond ps la date jour +21 : " . $dateRetourEstime, RESET;
}

echo "\n --------------------\n";


echo "-Test date retour estimé blu-ray (+21 duree emprunt) \n";
$bluray = new \App\BluRay('Le film', 'babouche', '1960', 170);
$emprunt2 = new \App\Emprunt($bluray,$adherant);
$dateRetourEstime = $emprunt2->getDateRetourEstime();
if ($dateRetourEstime == (new \DateTime())->add(new \DateInterval("P15D"))->format("d/m/Y")) {
    echo   GREEN . "La date correspond date jour +15 : " . $dateRetourEstime, RESET;
} else {
    echo  RED_BACKGROUND ."La date ne correspond ps la date jour +15 : " . $dateRetourEstime, RESET;
}


echo "\n --------------------\n";
$magazine = new \App\Magazine(6546, 'Foot 93', '06/06/2022');
$emprunt3 = new \App\Emprunt($magazine,$adherant);
echo "-Test date retour estimé Magazine (+10 duree emprunt) \n";
$emprunt2 = new \App\Emprunt($bluray,$adherant);
$dateRetourEstime = $emprunt3->getDateRetourEstime();
if ($dateRetourEstime == (new \DateTime())->add(new \DateInterval("P10D"))->format("d/m/Y")) {
    echo   GREEN . "La date correspond date jour +10 : " . $dateRetourEstime, RESET;
} else {
    echo  RED_BACKGROUND ."La date ne correspond ps la date jour +10 : " . $dateRetourEstime, RESET;
}

echo "\n --------------------\n";
echo "-Test emprunt est en cours quand la date de retour n’est pas renseigné \n";
if ($emprunt2->empruntEnCours() ){
    echo GREEN. "L'emprunt est toujours en cours". RESET;
} else {
    echo RED_BACKGROUND . ' Erreur' . RESET;
}


echo "\n --------------------\n";
echo "-Test emprunt est en alerte quand la date de retour estimée est  antérieure à la date du jour et que l’emprunt est en cours \n";
$emprunt45 = new \App\Emprunt($livre,$adherant);
$emprunt45->setDateEmprunt(new \DateTime('06/06/2023'));
if ($emprunt45->empruntAlerte()){
    echo GREEN. "L'emprunt est en alerte". RESET;
} else {
    echo RED_BACKGROUND . ' Erreur' . RESET;
}

echo "\n --------------------\n";
echo "-vérifier que la durée de l’emprunt a été dépassée quand la date de retour est postérieure à la date de retour estimée\n";
$emprunt450 = new \App\Emprunt($livre,$adherant);
$emprunt450->setDateEmprunt(new \DateTime('12/12/2022'));
$emprunt450->setDateRetour(new \DateTime('06/07/2022'));
if ($emprunt45->durreAutoriseDepasser()){
    echo GREEN. "L'emprunt a été dépassé ". RESET;
} else {
    echo RED_BACKGROUND . ' Erreur' . RESET;
}

