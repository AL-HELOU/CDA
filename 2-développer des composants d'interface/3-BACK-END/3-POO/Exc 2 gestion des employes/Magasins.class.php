<?php

class Magasin
{
    private $_magasinNom;
    private $_magasinAdresse;
    private $_magasinCodePostal;
    private $_magasinVille;
    private $_magasinModeRestauration;

    public function __construct($_magasinNom, $_magasinAdresse, $_magasinCodePostal, $_magasinVille, $_magasinModeRestauration)
    {
        $this->setNom($_magasinNom);
        $this->setAdresse($_magasinAdresse);
        $this->setCodePostal($_magasinCodePostal);
        $this->setVille($_magasinVille);
        $this->setModeRestauration($_magasinModeRestauration);
    }
    
    public function getNom() {return $this->_magasinNom; }
    public function setNom($sNom){$this->_magasinNom = $sNom;}

    public function getAdresse(){return $this->_magasinAdresse;}
    public function setAdresse($sAdresse){ $this->_magasinAdresse = $sAdresse;}

    public function getCodePostal(){return $this->_magasinCodePostal;}
    public function setCodePostal($sCodePostal){$this->_magasinCodePostal = $sCodePostal;}

    public function getVille(){return $this->_magasinVille; }
    public function setVille($sVille){$this->_magasinVille = $sVille;}

    public function getModeRestauration(){return $this->_magasinModeRestauration; }
    public function setModeRestauration($bModeRestauration){$this->_magasinModeRestauration = $bModeRestauration;}
}
?>
