<?php

namespace App\Tests;

use App\Adherant;
use PHPUnit\Framework\TestCase;

class AdherantTest extends TestCase {

    /**
     * @test
     */

    public function CreateNewAdherant_DateeNoPrcise_DateJour() {
        $dateJour = (new \DateTime())->format('d/m/Y');
        $adherant =  new Adherant('Alexi',"Bassignot","np@gmail.com");
        $dateAdhesion =$adherant->getDateAdhesion();
        $this->assertEquals($dateJour,$dateAdhesion);
    }

    /**
     * @test
     */
    public function CreateNewAdherant_DatePrcise_DatePriseEnCompte() {
        $dateAdhesion = "06/06/2023";
        $adherant =  new Adherant('Alexi',"Bassignot","np@gmail.com",$dateAdhesion);
        $this->assertEquals($adherant->getDateAdhesion(),$dateAdhesion);
    }

    /**
     * @test
     */
    /*public function CreateNewNumeroAdherant_CommenceParAD_Chaine() {
        $adherant =  new Adherant('Alexi',"Bassignot","np@gmail.com");
        $numeroAdherant =$adherant->getNumeroAdherant();
        $pattern = '/^AD-\d{6}$/';
        $numeroValide = preg_match($pattern, $numeroAdherant);

        $this->assertTrue($numeroValide);
    }*/



}