<?php

namespace App;

use DateTime;

class Emprunt
{
    private DateTime $dateEmprunt;
    private DateTime $dateRetourEstime;
    private ?DateTime $dateRetour;
    private Adherant $adherant;
    private Media $media;


    public function __construct($media, $adherant)
    {
        $this->dateEmprunt = new DateTime();
        $nbDuree = $media->GetDureeEmprunt();
        $this->dateRetourEstime = $this->dateEmprunt->add(new \DateInterval("P{$nbDuree}D"));
        $this->dateEmprunt = new DateTime();
        $this->media = $media;
        $this->adherant = $adherant;
        $this->dateRetour = null;
    }

    public function getInformations(): array
    {
        return [

            'media' => $this->getMedia(),
            'adhérnat' => $this->getAdherant(),
            'Date emprunt' => $this->getDateEmprunt(),
            'Date retour estimé' => $this->getDateRetourEstime(),
            'Date retour' => $this->getDateRetour(),
        ];
    }

    public function empruntEnCours(): bool
    {
        if (!isset($this->dateRetour)) {
            return true;
        } else {
            return false;
        }
    }


    public function empruntAlerte(): bool
    {
        if (new DateTime() > $this->getDateRetourEstime() and $this->empruntEnCours()) {
            return true;
        } else {
            return false;
        }
    }

    public function durreAutoriseDepasser() : bool {
        if ($this->dateRetour > $this->getDateRetourEstime()) {
            return "true";
        } else {
            return 'false';
        }
    }

    /**
     * @param DateTime $dateEmprunt
     */
    public function setDateEmprunt(DateTime $dateEmprunt): void
    {
        $this->dateEmprunt = $dateEmprunt;
    }


    /**
     * @return DateTime
     */
    public function getDateEmprunt(): string
    {
        return $this->dateEmprunt->format('d/m/Y');
    }

    /**
     * @return DateTime
     */
    public function getDateRetourEstime(): string
    {
        return $this->dateRetourEstime->format('d/m/Y');
    }

    /**
     * @return DateTime
     */
    public function getDateRetour(): DateTime
    {
        return $this->dateRetour;
    }

    /**
     * @return Media
     */
    public function getMedia(): Media
    {
        return $this->media;
    }

    /**
     * @return Adherant
     */
    public function getAdherant(): Adherant
    {
        return $this->adherant;
    }


    public function setDateRetour(DateTime $dateRetour): void
    {
        $this->dateRetour = $dateRetour;
    }


}