<?php
namespace App;

abstract class Media
{
    protected int $dureeEmprunt;
    protected string $titre;

    public function __construct(int $dureeEmprunt, string $titre)
    {
        $this->dureeEmprunt = $dureeEmprunt;
        $this->titre = $titre;
    }

    public function GetDureeEmprunt(): int
    {
        return $this->dureeEmprunt;
    }

    public function GetTitre(): string
    {
        return $this->titre;
    }

    abstract public function GetInformations():array;

}
