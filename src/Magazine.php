<?php

namespace App;

class Magazine extends Media {
    private int $numero;
    private \DateTime $datePublication;

    public function __construct( int $numero , string $titre,  $datePublication)
    {
        parent::__construct($titre);
        $this->dureeEmprunt = 10;
        $this->numero = $numero;
        $this->datePublication = \DateTime::createFromFormat('d/m/Y', $datePublication);
    }

    public function GetInformations(): array
    {
        return [
            'numero' => $this->numero,
            'titre' => $this->titre,
            'date publication' => $this->datePublication->format('d/m/Y'),
            'duree Emprunt' => $this->dureeEmprunt.' jours',
        ];

    }

    /**
     * @return int
     */
    public function getNumero(): int
    {
        return $this->numero;
    }


    public function GetDatePublication() :string {
        return $this->datePublication->format('d/m/Y');
    }




}