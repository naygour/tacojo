<?php

require_once("../config.php");

try{
    $db = NEW PDO('mysql:host='.$config['serveur'].'; dbname='.$config['bd'], $config['login'], $config['mdp']);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

if(isset($_GET['term'])) {

    // Mot tapé par l'utilisateur
    $q = htmlentities($_GET['term']);

    // Connexion à la base de données
    $ac_term = "%".$_GET['term']."%";

    $query = "SELECT * FROM patient where num_id_national like :term OR num_inclusion like :term";

    $result = $db->prepare($query);
    $result->bindValue(":term",$ac_term);
    $result->execute();

    $return_arr = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        if(isset($row['num_id_national']) && isset($row['num_inclusion'])) {
            array_push($return_arr, array('label' => $row['num_id_national'] . ' - ' . $row['num_inclusion'], 'value' => $row['id_patient']));
        }elseif(isset($row['num_id_national']) && !isset($row['num_inclusion'])){
            array_push($return_arr, array('label' => $row['num_id_national'], 'value' => $row['id_patient']));
        }else{
             array_push($return_arr, array('label' => $row['num_inclusion'], 'value' => $row['id_patient']));
        }
    }
    echo json_encode($return_arr);


}
?>