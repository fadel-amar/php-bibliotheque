<?php

namespace App;

class BluRay extends Media {

    private string $realisateur;
    private int  $duree;
    private int $anneeSortie;



    public function __construct(string $titre, $realisateur,  $anneeSortie, $duree )
    {
        parent::__construct( $titre);
        $this->dureeEmprunt = 15;
        $this->realisateur = $realisateur;
        $this->duree = $duree;
        $this->anneeSortie = $anneeSortie;
        ;
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

    /**
     * @return string
     */
    public function getRealisateur(): string
    {
        return $this->realisateur;
    }

    /**
     * @return int
     */
    public function getDuree(): int
    {
        return $this->duree;
    }

    /**
     * @return \DateTime
     */
    public function getAnneeSortie(): string
    {
        return $this->anneeSortie;
    }



}