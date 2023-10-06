<?php
require_once("Magasins.class.php");

class Employe
{
    // PROPRIETES
    private $_nom;
    private $_prenom;
    private $_dateEmbauche;
    private $_fonction;
    private $_salaireannuel;
    private $_service;
    private $_chequeVacances;
    private $_chequeNoel;
    private $_magasin;
    private $_enfants;
    private $_ageEnfants;


    // CONSTRUCTEUR
    public function __construct($_nom, $_prenom, $_dateEmbauche, $_fonction, $_salaireannuel, $_service, $mag, $_enfants, $_ageEnfants)
    {
        $this->setNom($_nom);
        $this->setPrenom($_prenom);
        $this->setDateEmbauche($_dateEmbauche);
        $this->setFonction($_fonction);
        $this->setSalaire($_salaireannuel);
        $this->setService($_service);
        $this->setMagasin($mag);
        $this->setEnfants($_enfants);
        $this->setAgeEnfants($_ageEnfants);
    }
    
    //  ACCESSEURS ET MUTATEURS
    public function setNom($sNom)  { $this->_nom = $sNom;}
    public function getNom()  {return $this->_nom;}


    public function setPrenom($sPrenom)  { $this->_prenom = $sPrenom;}
    public function getPrenom()  {return $this->_prenom;}


    public function setDateEmbauche($sDateEmbauche)
    {
        $format = "d-m-Y";
        $date = DateTime::createFromFormat($format,$sDateEmbauche);
        $this->_dateEmbauche = $date;
    }
    public function getDateEmbauche()  {return $this->_dateEmbauche;}


    public function setFonction($sFonction)  { $this->_fonction = $sFonction; }
    public function getFonction()  {return $this->_fonction;}

    public function setSalaire($sSalaire)  { $this->_salaireannuel = $sSalaire;}
    public function getSalaire() {return $this->_salaireannuel;}


    public function setService($sService) { $this->_service = $sService;}
    public function getService()  {return $this->_service;}

    public function setMagasin($sMag) {$this->_magasin = $sMag;}
    public function getMagasin(){return $this->_magasin;}

    public function setEnfants($_enfants) {$this->_enfants = $_enfants;}
    public function getEnfants() {return $this->_enfants;}


    public function setAgeEnfants($_ageEnfants) {$this->_ageEnfants = $_ageEnfants;}
    public function getAgeEnfants()
    {
        $date_courante = new Datetime();
        $test = "";

        foreach($this->_ageEnfants as $enfant => $age)
        {
            if ($this->_enfants == 0)
            {
                return " / ";
            }
            else
            {
                $date_naissance = DateTime::createFromFormat('Y-m-d', $age);
                $age_enfant =  (int)(($date_courante) -> diff($date_naissance))-> format('%y');
    
                
                $test = $test . $age_enfant . ", ";
            }
        }
        return $test;
        // return $this->_ageEnfants; 
    }


    // METHODES
    public function getAnciennete()
    {
        $date = new DateTime();
        $DateEmbauche = $this->getDateEmbauche();
        
        $anneeAnciennete = date_diff($DateEmbauche,$date);
        
        return $anneeAnciennete->y;
    }


    public function calculerPrime()
    {
        $primeAnnuel = $this->_salaireannuel * 0.05;
        $primeAnciennete = $this->_salaireannuel * (0.02 * $this->getAnciennete());
        $primeTotale = $primeAnnuel + $primeAnciennete;
        return $primeTotale;
    }

    public function payerprime()
    {
        $datecourante = new DateTime();
        $datemois = $datecourante->format("m");
        $datejour = $datecourante->format("d");
        $dateannee = $datecourante->format("y");
        $prime = self::calculerPrime();

        if ($datemois == "11" && $datejour == "30")
        {
            $envprime = "La prime de $prime € a été envoyé à la banque le $datejour/$datemois/$dateannee.";
            return  $envprime;
        }else{
            $envprime = "La prime est versée au 30/11 de chaque année.";
            return $envprime;
        }
    }


    public function isChequeVacance()
    {
        if($this->getAnciennete() > 0){
            $this->_chequeVacances = true;
        }       
        else{
            $this->_chequeVacances = false;
        }
        return $this->_chequeVacances;
    }

    public function ischequesNoel()
    {
        $date_courante = new Datetime();
        $u10 = 0;
        $u15 = 0;
        $u18 = 0;

        if($this->_enfants == 0)
        {
            echo "Chèques Noël : Non <br><br>";
        }
        else
        {
            foreach($this->_ageEnfants as $enfant => $age)
            {
                if ($this->_enfants == 0)
                {
                    return " / ";
                }
                else
                {
                    $date_naissance = DateTime::createFromFormat('Y-m-d', $age);
                    $age_enfant =  (int)(($date_courante) -> diff($date_naissance))-> format('%y');
                    
                    if(($age_enfant>=0) && ($age_enfant<=10))
                    {
                        $u10++;
                    }
                    elseif(($age_enfant>=11) && ($age_enfant<=15))
                    {
                        $u15++;
                    }
                    elseif(($age_enfant>=16) && ($age_enfant<=18))
                    {
                        $u18++;
                    }
                }
            }

            if(($u10==0) && ($u15==0) && ($u18==0))
            {
                echo "Chèques Noël : Non <br>";
            }
            else
            {
                echo "Chèques Noël : Oui <br><br>";
            }
            if($u10!=0)
            {
                echo "Chèque(s) de Noël 20€ : " . $u10 . "<br>";
            }
            if($u15!=0)
            {
                echo "Chèque(s) de Noël 30€ : " . $u15 . "<br>";
            }    
            if($u18!=0)
            {
                echo "Chèque(s) de Noël 50€ : " . $u18 . "<br>";
            }
            echo "<br>";
        }
    }
}






$magasin1 = new Magasin("Jarditou Amiens", "8 route de Paris", "80000", "Amiens", "Cantine");
$magasin2 = new Magasin("Jarditou Abbeville", "195 boulevard de la République", "80100", "Abbeville", "Tickets");



$employ1 = New Employe("Christine", "Dufour", "28-03-2019", "Secrétaire", "25000", "Direction", $magasin1, 2, array("enfant1" => "2017-02-15", "enfant2" => "2015-05-18"));

if($employ1->isChequeVacance())
{
    echo "Employe 1: (". $employ1->getNom(). " ". $employ1->getPrenom(). ") : " . "a le droit à un chéque vacance.<br><br>";
}

echo "Employe 1: (". $employ1->getNom(). " ". $employ1->getPrenom(). ") : " .
$employ1->payerprime()."<br><br>";

$employ1->ischequesNoel();

echo "<br><br><br>";


$employ2 = new Employe("Denis", "Charpentier", "19-04-2008", "Technicien", "26000", "Production", $magasin1, 1, array("enfant1" => "2007-01-10"));

if($employ2->isChequeVacance())
{
    echo "Employe 2: (". $employ2->getNom(). " ". $employ2->getPrenom(). ") : " . "a le droit à un chéque vacance.<br><br>";
}

echo "Employe 2: (". $employ2->getNom(). " ". $employ2->getPrenom(). ") : " .
$employ2->payerprime()."<br><br>";

$employ2->ischequesNoel();

echo "<br><br><br>";



$employ3 = new Employe("Robert", "Moulin", "10-05-2015", "Technicien", "24000", "Production", $magasin2, 0, array("enfant1" => "Non"));

if($employ3->isChequeVacance())
{
    echo "Employe 3: (". $employ3->getNom(). " ". $employ3->getPrenom(). ") : " . "a le droit à un chéque vacance.<br><br>";
}

echo "Employe 3: (". $employ3->getNom(). " ". $employ3->getPrenom(). ") : " .
$employ3->payerprime()."<br><br>";

$employ3->ischequesNoel();
?>