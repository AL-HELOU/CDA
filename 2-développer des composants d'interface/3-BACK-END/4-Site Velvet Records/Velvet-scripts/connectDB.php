<?php
function ConnexionBase() {

    $error = null;
    $errorcode = null;

    try 
    {
        $connexion = new PDO('mysql:host=localhost; charset=utf8; dbname=record', 'alhelou', 'alhelouafpa');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;

    } catch (Exception $e) {
        $error = $e->getMessage();
        $errorcode = $e->getCode();
    }
    if ($error){
        echo "<pre>Erreur : " . $error . "</pre><br>";
        echo "<pre>N° : " . $errorcode."</pre>";
        die("Fin du script");
    }
}
?>