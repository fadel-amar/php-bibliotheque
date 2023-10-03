<?php

require "./vendor/autoload.php";

$livre1 = new \App\Livre('213-56-456','jean','Les5 vwvvdv',78);
echo $livre1->GetDureeEmprunt().'\n';
print_r($livre1->GetInformations()). '\n';
echo $livre1->GetTitre();

echo PHP_EOL;


$magazine2 = new \App\Magazine('456','Les 10 top','25/12/2021');
print_r($magazine2->GetInformations());
echo $magazine2->GetDatePublication();

echo PHP_EOL;echo PHP_EOL;

$blueray = new \App\BluRay('Top boy','CHirac',2025,125);
echo $blueray->getAnneeSortie();

