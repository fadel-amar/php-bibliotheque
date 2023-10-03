<?php

namespace App;

class Magazine extends Media {
    private int $numero;
    private \DateTime $datePublication;

    public function __construct( int $numero ,int $dureeEmprunt, string $titre,  $datePublication)
    {
        parent::__construct($dureeEmprunt, $titre);
        $this->dureeEmprunt = 10;
        $this->numero = $numero;
        $this->datePublication = $datePublication;
    }

    public function GetInformations(): array
    {
        return [
            'numero' => $this->numero,
            'titre' => $this->titre,
            'date publication' => $this->datePublication,
            'duree Emprunt' => $this->dureeEmprunt.' jours',
        ];

    }


}