<?php
require_once("../MyLibrery/connection.php");

class FournisseursBD
{
    public $codeFour;
    public $codeEntrFK;
    public $nomFour;
    public $raisonSocialFour;
    public $secteur;
    public $categorie;
    public $adresse;
    public $ville;
    public $codePostale;
    public $pays;
    public $email;
    public $fixe;
    public $fax;
    public $siteWeb;
    public $fullNameContact;
    public $gsmContact;
    public $logoFour;

    public function __construct($_codeFour,$_codeEntrFK,$_nomFour,$_raisonSocialFour,$_secteur,$_categorie,$_adresse,$_ville,$_codePostale,$_pays,$_email,$_fixe,$_fax,$_siteWeb,$_fullNameContact,$_gsmContact,$_logoFour)
    {
        $this->codeFour=$_codeFour;
        $this->codeEntrFK=$_codeEntrFK;
        $this->nomFour=$_nomFour;
        $this->raisonSocialFour=$_raisonSocialFour;
        $this->secteur=$_secteur;
        $this->categorie=$_categorie;
        $this->adresse=$_adresse;
        $this->ville=$_ville;
        $this->codePostale=$_codePostale;
        $this->pays=$_pays;
        $this->email=$_email;
        $this->fixe=$_fixe;
        $this->fax=$_fax;
        $this->siteWeb=$_siteWeb;
        $this->fullNameContact=$_fullNameContact;
        $this->gsmContact=$_gsmContact;
        $this->logoFour=$_logoFour;
    }

    public function afficherFournisseurs()
    {
        echo("CodeFour = $this->codeFour \nCodeEntr = $this->codeEntrFK \nNomFour = $this->nomFour \nRaisonSocialFour = $this->raisonSocialFour \nSecteur = $this->secteur \nCategorie = $this->categorie \nAdresse = $this->adresse \nVille = $this->ville \nCodePostale = $this->codePostale \nPays = $this->pays \nEmail = $this->email \nFixe = $this->fixe \nFax = $this->fax \nSiteWeb = $this->siteWeb \nFullNameContact = $this->fullNameContact \nGsmContact = $this->gsmContact \nLogoFOur = $this->logoFour "); 
    }
}
?>
