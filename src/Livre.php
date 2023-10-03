<?php

namespace App;

class Livre extends Media {
    private string $isbn;
    private string $auteur;
    private int $nbPages;

    public function __construct($isbn, $auteur, $titre, $nbPages,$dureeEmprunt) {
        $this->dureeEmprunt =21;
        parent::__construct($titre, $dureeEmprunt);
        $this->isbn = $isbn;
        $this->auteur = $auteur;
        $this->nbPages = $nbPages;
    }

    public function GetInformations(): array  {
        return [
            'isbn' => $this->isbn,
            'titre' => $this->titre,
            'auteur' => $this->auteur,
            'nombre pages ' => $this->nbPages,
            'duree Emprunt' => $this->dureeEmprunt.' jours',
        ];

    }




}