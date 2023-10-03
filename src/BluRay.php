<?php

namespace App;

class BluRay extends Media {

    private string $realisateur;
    private int  $duree;
    private \DateTime $anneeSortie;



    public function __construct(int $dureeEmprunt, string $titre, $realisateur, $anneeSortie, $duree )
    {
        parent::__construct($dureeEmprunt, $titre);
        $this->dureeEmprunt = 15;
        $this->realisateur = $realisateur;
        $this->duree = $duree;
        $this->anneeSortie = $anneeSortie;
    }


    public function GetInformations(): array
    {
        return [
            'titre' => $this->titre,
            'realisateurr' => $this->realisateur,
            'duree ' => $this->duree,
            'anne Sortie ' => $this->anneeSortie,
            'duree Emprunt' => $this->dureeEmprunt.' jours',
        ];
    }

}