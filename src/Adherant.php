<?php /** @noinspection PhpLanguageLevelInspection */

namespace App;

class Adherant
{
    private string $numeroAdherant;
    private string  $prenom;
    private string  $nom;
    private string  $email;
    private \DateTime  $dateAdhesion;


    public function __construct(string $prenom,string $nom, string $email, ?string $dateAdhesion = null) {
        $this->numeroAdherant = $this->genererNumero();
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        if($dateAdhesion == null) {
            $this->dateAdhesion = new \DateTime();
        } else {
            $this->dateAdhesion = \DateTime::createFromFormat('d/m/Y',$dateAdhesion);
        }
    }

    public function genererNumero() : string
    {
        $chiffreAleatoire = rand(0,999999);
        return "AD-{$chiffreAleatoire}";
    }

    public function RenouvlerAdhesion (): void {
        $this->dateAdhesion = $this->dateAdhesion->add(\DateInterval::createFromDateString("+1 Y"));
    }




    /**
     * @return string
     */
    public function getNumeroAdherant(): string
    {
        return $this->numeroAdherant;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getDateAdhesion(): string
    {
        return $this->dateAdhesion->format('d/m/Y');
    }


}