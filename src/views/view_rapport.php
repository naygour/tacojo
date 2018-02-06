<?php

function viewRapport($db)
{
    echo
    '
    <!--<div id="content-wrapper">-->
        <div class="container">
        <div class="mui--appbar-height"></div>
        <div class="mui-container-fluid">

          <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="center">
                        <h2>RAPPORT MENSUEL - PEC - PATIENTS SOUS ARV <1 an </h2>
                    </div>
                </div>
            </div>

            Choisissez une année

            <form action="" method="post">


            <select id="selectAnnee" name="select">';
            $mois = ['Janvier','Février', 'Mars' , 'Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'];
            for ($i = 2016; $i <= 2050; $i++)
            {
                for ($j=1; $j <13 ; $j++)
                {
                    echo '<option value = '.$i.'-'.$j.'-01 >'.$mois[$j-1].' / '.$i.' </option>';
                }
            }
            echo
            '
            </select>

    <input type="submit" name="submit" value="Valider" />
    </form>
    <br>';

    if (isset($_POST['submit']))
    {
                $M1=0;$M2=0;$M3=0;$M4=0;
                $F1=0;$F2=0;$F3=0;$F4=0;
                $MoisF1=0;$MoisF2=0;$MoisF3=0;$MoisF4=0;
                $MoisM1=0;$MoisM2=0;$MoisM3=0;$MoisM4=0;
                $DecedeF1=0;$DecedeF2=0;$DecedeF3=0;$DecedeF4=0;
                $DecedeM1=0;$DecedeM2=0;$DecedeM3=0;$DecedeM4=0;
                $TransfertSortantF1=0;$TransfertSortantF2=0;$TransfertSortantF3=0;$TransfertSortantF4=0;
                $TransfertSortantM1=0;$TransfertSortantM2=0;$TransfertSortantM3=0;$TransfertSortantM4=0;
                $TransfertEntrantF1=0;$TransfertEntrantF2=0;$TransfertEntrantF3=0;$TransfertEntrantF4=0;
                $TransfertEntrantM1=0;$TransfertEntrantM2=0;$TransfertEntrantM3=0;$TransfertEntrantM4=0;
                $PDVF1=0;$PDVF2=0;$PDVF3=0;$PDVF4=0;
                $PDVM1=0;$PDVM3=0;$PDVM2=0;$PDVM4=0;
                $PDVRF1=0;$PDVRF2=0;$PDVRF3=0;$PDVRF4=0;
                $PDVRM1=0;$PDVRM2=0;$PDVRM3=0;$PDVRM4=0;
                echo '<script language="JavaScript">$("#selectAnnee").val('.$_POST['select'].')</script>';
                $date=$_POST['select'];
                $test           = new rapport($db);
                $mois           = $test->selectMois($_POST['select']);
                $mois           = $mois['mois']; // On récupere le mois 
                $annee          = $test->selectAnnee($_POST['select']);
                $annee          = $annee['annee']; // On recupere l'annee
                $moisSuivant=$mois+1;
                if($mois==12){
                    $moisSuivant=1;
                }
                echo $moisSuivant;
                $date    = "".$annee."-".$moisSuivant."-01"; // On récupere la date du mois d'apres 
                //$liste          = $test->selectInscritAvant($leMoisApres); // On calcule avant ce mois pour ensuite savoir si la date coreespond au mois au avant
                //$listePatientDecede  = $test->selectEtatDisp($mois , $annee , 3); // On cherche les Patients du mois qui sont DCD 
                
                
                /*foreach ($liste as $unPatient) {
                    if($unPatient['sexe']=='F'){
                        if($unPatient['AgeEnJour']<365){
                            if($unPatient['mois']==$mois && $unPatient['year']==$annee){
                                $MoisF1=$MoisF1+1;
                            }
                            else{
                                $F1=$F1+1;
                            }
                        }
                        elseif($unPatient['AgeEnJour']>364 && $unPatient['AgeEnJour']<1826) {
                            if($unPatient['mois']==$mois && $unPatient['year']==$annee){
                                $MoisF2=$MoisF2+1;
                            }
                            else{
                                $F2=$F2+1;
                            }
                        }
                        elseif($unPatient['AgeEnJour']>1825 && $unPatient['AgeEnJour']<5479) {
                            if($unPatient['mois']==$mois && $unPatient['year']==$annee){
                                $MoisF3=$MoisF3+1;
                            }
                            else{
                                $F3=$F3+1;
                            }
                        }
                        else{
                            if($unPatient['mois']==$mois && $unPatient['year']==$annee){
                                $MoisF4=$MoisF4+1;
                            }
                            else{
                                $F4=$F4+1;
                            }
                        }
                    }
                    else{
                        if($unPatient['AgeEnJour']<365){
                            if($unPatient['mois']==$mois && $unPatient['year']==$annee){
                                $MoisM1=$MoisM1+1;
                            }
                            else{
                                $M1=$M1+1;
                            }
                        }
                        elseif($unPatient['AgeEnJour']>364 && $unPatient['AgeEnJour']<1826) {
                            if($unPatient['mois']==$mois && $unPatient['year']==$annee){
                                $MoisM2=$MoisM2+1;
                            }
                            else{
                                $M2=$M2+1;
                            }
                        }
                        elseif($unPatient['AgeEnJour']>1825 && $unPatient['AgeEnJour']<5479) {
                            if($unPatient['mois']==$mois && $unPatient['year']==$annee){
                                $MoisM3=$MoisM3+1;
                            }
                            else{
                                $M3=$M3+1;
                            }
                        }
                        else{
                            if($unPatient['mois']==$mois && $unPatient['year']==$annee){
                                $MoisM4=$MoisM4+1;
                            }
                            else{
                                $M4=$M4+1;
                            }
                        }
                    }
                }
                */
                
                $patient        = new Patient($db);
                $listePatient   = $patient ->selectAll2($date);   // On récupère tout d'abord la liste de tout les patients      
                 
                foreach ($listePatient as $unPatient) {
                    $rapport        = new rapport($db);
                    $laDispensationDuMois   = $rapport ->selectEtatDisp($mois , $annee , $unPatient['id_patient']);
                    if($unPatient['AgeEnJour']>0){   
                        
                        if($unPatient['sexe']=='F'){ // Si c'est féminin 

                            if($unPatient['AgeEnJour']<365){ // Si moins d'un an 

                                if($unPatient['moisInscription']==$mois && $unPatient['yearInscription']==$annee){ // Si ARV ce mois si
                                    $MoisF1=$MoisF1+1;
                                }
                                elseif(strtotime($unPatient['dateInscription']) < strtotime($date)) { // Si la date est avant la date demandé 
                                    $F1=$F1+1;
                                }
                                if($laDispensationDuMois['etat_dispensation']==3){
                                    $DecedeF1=$DecedeF1+1;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==5){
                                    $TransfertSortantF1 = $TransfertSortantF1 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==8){
                                    $TransfertEntrantF1 = $TransfertEntrantF1 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==6){
                                    $PDVF1 = $PDVF1 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==7){
                                    $PDVRF1 = $PDVRF1 + 1 ;
                                }
                                
                            }

                            elseif($unPatient['AgeEnJour']>364 && $unPatient['AgeEnJour']<1826) {

                                if($unPatient['moisInscription']==$mois && $unPatient['yearInscription']==$annee){
                                    $MoisF2=$MoisF2+1;
                                }
                                elseif(strtotime($unPatient['dateInscription']) < strtotime($date)) {
                                    $F2=$F2+1;
                                }
                                if($laDispensationDuMois['etat_dispensation']==3){
                                    $DecedeF2=$DecedeF2+1;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==5){
                                    $TransfertSortantF2 = $TransfertSortantF2 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==8){
                                    $TransfertEntrantF2 = $TransfertEntrantF2 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==6){
                                    $PDVF2 = $PDVF2 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==7){
                                    $PDVRF2 = $PDVRF2 + 1 ;
                                }
                            }
                            
                            elseif($unPatient['AgeEnJour']>1825 && $unPatient['AgeEnJour']<5479) {
                                
                                if($unPatient['moisInscription']==$mois && $unPatient['yearInscription']==$annee){
                                    $MoisF3=$MoisF3+1;
                                }
                                elseif(strtotime($unPatient['dateInscription']) < strtotime($date)) {
                                    $F3=$F3+1;
                                }
                                if($laDispensationDuMois['etat_dispensation']==3){
                                    $DecedeF3=$DecedeF3+1;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==5){
                                    $TransfertSortantF3 = $TransfertSortantF3 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==8){
                                    $TransfertEntrantF3 = $TransfertEntrantF3 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==6){
                                    $PDVF3 = $PDVF3 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==7){
                                    $PDVRF3 = $PDVRF3 + 1 ;
                                }
                            }
                            
                            else{
                                
                                if($unPatient['moisInscription']==$mois && $unPatient['yearInscription']==$annee){
                                    $MoisF4=$MoisF4+1;
                                }
                                 elseif(strtotime($unPatient['dateInscription']) < strtotime($date)) {
                                    $F4=$F4+1;
                                }
                                if($laDispensationDuMois['etat_dispensation']==3){
                                    $DecedeF4=$DecedeF4+1;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==5){
                                    $TransfertSortantF4 = $TransfertSortantF4 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==8){
                                    $TransfertEntrantF4 = $TransfertEntrantF4 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==6){
                                    $PDVF4 = $PDVF4 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==7){
                                    $PDVRF4 = $PDVRF4 + 1 ;
                                }
                            }
                        }
                        else{
                            
                            if($unPatient['AgeEnJour']<365){
                                
                                if($unPatient['moisInscription']==$mois && $unPatient['yearInscription']==$annee){
                                    $MoisM1=$MoisM1+1;
                                }
                               elseif(strtotime($unPatient['dateInscription']) < strtotime($date)) {
                                    $M1=$M1+1;
                                }
                                if($laDispensationDuMois['etat_dispensation']==3){
                                    $DecedeM1=$DecedeM1+1;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==5){
                                    $TransfertSortantM1 = $TransfertSortantM1 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==8){
                                    $TransfertEntrantM1 = $TransfertEntrantM1 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==6){
                                    $PDVM1 = $PDVM1 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==7){
                                    $PDVRM1 = $PDVRM1 + 1 ;
                                }
                            }
                            
                            elseif($unPatient['AgeEnJour']>364 && $unPatient['AgeEnJour']<1826) {
                                
                                if($unPatient['moisInscription']==$mois && $unPatient['yearInscription']==$annee){
                                    $MoisM2=$MoisM2+1;
                                }
                                elseif(strtotime($unPatient['dateInscription']) < strtotime($date)) {
                                    $M2=$M2+1;

                                }
                                if($laDispensationDuMois['etat_dispensation']==3){
                                    $DecedeM2=$DecedeM2+1;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==5){
                                    $TransfertSortantM2 = $TransfertSortantM2 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==8){
                                    $TransfertEntrantM2 = $TransfertEntrantM2 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==6){
                                    $PDVM2 = $PDVM2 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==7){
                                    $PDVRM2 = $PDVRM2 + 1 ;
                                }
                            }
                            
                            elseif($unPatient['AgeEnJour']>1825 && $unPatient['AgeEnJour']<5479) {
                                
                                if($unPatient['moisInscription']==$mois && $unPatient['yearInscription']==$annee){
                                    $MoisM3=$MoisM3+1;
                                }
                                elseif(strtotime($unPatient['dateInscription']) < strtotime($date)) {
                                    $M3=$M3+1;
                                }
                                if($laDispensationDuMois['etat_dispensation']==3){
                                    $DecedeM3=$DecedeM3+1;
                                }
                                if($laDispensationDuMois['etat_dispensation']==5){
                                    $TransfertSortantM3 = $TransfertSortantM3 + 1 ;
                                }
                                if($laDispensationDuMois['etat_dispensation']==8){
                                    $TransfertEntrantM3 = $TransfertEntrantM3 + 1 ;
                                }
                                if($laDispensationDuMois['etat_dispensation']==6){
                                    $PDVM3 = $PDVM3 + 1 ;
                                }
                                if($laDispensationDuMois['etat_dispensation']==7){
                                    $PDVRM3 = $PDVRM3 + 1 ;
                                }
                            }
                            
                            else{
                                
                                if($unPatient['moisInscription']==$mois && $unPatient['yearInscription']==$annee){
                                    $MoisM4=$MoisM4+1;
                                }
                                elseif(strtotime($unPatient['dateInscription']) < strtotime($date)) {
                                    $M4 = $M4+1;
                                }
                                if($laDispensationDuMois['etat_dispensation']==3){
                                    $DecedeM4=$DecedeM4+1;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==5){
                                    $TransfertSortantM4 = $TransfertSortantM4 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==8){
                                    $TransfertEntrantM4 = $TransfertEntrantM4 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==6){
                                    $PDVM4 = $PDVM4 + 1 ;
                                }
                                elseif($laDispensationDuMois['etat_dispensation']==7){
                                    $PDVRM4 = $PDVRM4 + 1 ;
                                }
                            }
                        }
                    }
                }
    }
                    

       
    else
    {
        ($_POST['select']= date('Y'));
    }

    echo
    '
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-9">
                    <h3 class="panel-title">Présentation des rapports de '. $_POST['select'].'</h3>
                  </div>
                </div>
              </div>
              <div class="panhttp://172.16.207.74/Senegal/Senegal/tacojo/index.php?page=rapport#el-body">
                <form method="POST" action="index.php?page=rapport">



                <table style="min-width : 100%" id="repDataTable1" class="table table-striped table-bordered table-list display">';

                $rapport    = new rapport($db);
                $stats      = $rapport->selectAllExceptId();
                $nb         = count($stats);
                
                
                if($nb>0)
                {
                    echo
                    '
                      <thead>
                        <tr>
                            <th>Age</th>
                            <th>Sexe</th>
                            <th>Nombre total de patients qui ont été suivis sous ARV dans le site depuis le début jusqu’au mois précédent</th>
                            <thNombre total de patients sous ARV régulièrement suivis jusqu\'au mois précédent</th>
                            <th>Nombre de nouveaux patients mis sous ARV durant le mois  </th>
                            <th>Nombre de patients sous ARV décédés et enregistrés durant le mois  </th>
                            <th>Nombre de patients sous ARV déclarés perdus de vue durant le mois </th>
                            <th>Nombre de patients sous ARV perdus de vue et revenus durant le mois</th>
                            <th>Nombre de patients sous ARV transférés dans le site (TE) durant le mois </th>
                            <th>Nombre de patients sous ARV transférés vers un autre site (TA) durant le mois  </th>
                            <th> Nombre total de patients sous ARV régulèrement suivis (file active sous ARV) </th>
                            </tr>
                      </thead>
      
                    <tr>
                    <td rowspan="2"> <1 an </td>
                    <td>M</td>
                    <td>'.$M1.'</td>
                    <td>'.$MoisM1.'</td>
                    <td>'.$DecedeM1.'</td>
                    <td>'.$PDVM1.'</td>
                    <td>'.$PDVRM1.'</td>
                    <td>'.$TransfertEntrantM1.'</td>
                    <td>'.$TransfertSortantM1.'</td>                    
                    <td></td>                   
                    <td></td>
                    </tr>                   
                    <tr>
                    <td>F</td>
                    <td>'.$F1.'</td>
                    <td>'.$MoisF1.'</td>
                    <td>'.$DecedeF1.'</td>
                    <td>'.$PDVF1.'</td>
                    <td>'.$PDVRF1.'</td>
                    <td>'.$TransfertEntrantF1.'</td>
                    <td>'.$TransfertSortantF1.'</td>                      
                    </tr>
                    
                    <tr>
                    <td rowspan="2"> 1-4 ans </td>
                    <td>M</td>
                    <td>'.$M2.'</td>
                    <td>'.$MoisM2.'</td>
                    <td>'.$DecedeM2.'</td>
                    <td>'.$PDVM2.'</td>
                    <td>'.$PDVRM2.'</td>
                    <td>'.$TransfertEntrantM2.'</td>
                    <td>'.$TransfertSortantM2.'</td>                     
                    <td></td>                   
                    <td></td>
                    </tr>                    
                    <tr>
                    <td>F</td>
                    <td>'.$F2.'</td>
                    <td>'.$MoisF2.'</td>
                    <td>'.$DecedeF2.'</td>
                    <td>'.$PDVF2.'</td>
                    <td>'.$PDVRF2.'</td>
                    <td>'.$TransfertEntrantF2.'</td>
                    <td>'.$TransfertSortantF2.'</td>                      
                    </tr>
                    
                    <tr>
                    <td rowspan="2"> 5-14 ans </td>
                    <td>M</td>
                    <td>'.$M3.'</td>
                    <td>'.$MoisM3.'</td>
                    <td>'.$DecedeM3.'</td>
                    <td>'.$PDVM3.'</td>
                    <td>'.$PDVRM3.'</td>
                    <td>'.$TransfertEntrantM3.'</td>
                    <td>'.$TransfertSortantM3.'</td>                   
                    <td></td>                   
                    <td></td>
                    </tr>                   
                    <tr>
                    <td>F</td>
                    <td>'.$F3.'</td>
                    <td>'.$MoisF3.'</td>
                    <td>'.$DecedeF3.'</td>
                    <td>'.$PDVF3.'</td>
                    <td>'.$PDVRF3.'</td>
                    <td>'.$TransfertEntrantF3.'</td>
                    <td>'.$TransfertSortantF3.'</td>                   
                    </tr>
                    
                    <tr>
                    <td rowspan="2"> > 14 ans </td>
                    <td>M</td>
                    <td>'.$M4.'</td>
                    <td>'.$MoisM4.'</td>
                    <td>'.$DecedeM4.'</td>
                    <td>'.$PDVM4.'</td>
                    <td>'.$PDVRM4.'</td>
                    <td>'.$TransfertEntrantM4.'</td>
                    <td>'.$TransfertSortantM4.'</td>                   
                    <td></td>                   
                    <td></td>
                    </tr>                    
                    <tr>
                    <td>F</td>
                    <td>'.$F4.'</td>
                    <td>'.$MoisF4.'</td>
                    <td>'.$DecedeF4.'</td>
                    <td>'.$PDVF4.'</td>
                    <td>'.$PDVRF4.'</td>
                    <td>'.$TransfertEntrantF4.'</td>
                    <td>'.$TransfertSortantF4.'</td>                    
                    </tr>
                    
                        
                      <tbody>
                    ';

                    
                }
                
                echo '
                    <tr>
                    <td class="bg-danger">Total</td>
                    <td class="bg-danger"></td>
                    <td class="bg-danger">'.($F1 + $F2 + $F3 + $F4 + $M1 + $M2 + $M3 + $M4).'</td>
                    <td class="bg-danger">'.($MoisF1 + $MoisF2 + $MoisF3 + $MoisF4 + $MoisM1 + $MoisM2 + $MoisM3 + $MoisM4).'</td>
                    <td class="bg-danger">'.($DecedeF1 + $DecedeF2 + $DecedeF3 + $DecedeF4 + $DecedeM1 + $DecedeM2 + $DecedeM3 + $DecedeM4).'</td>
                    <td class="bg-danger">'.($PDVF1 + $PDVF2 + $PDVF3 + $PDVF4 + $PDVM1 + $PDVM2 + $PDVM3 + $PDVM4).'</td>
                    <td class="bg-danger">'.($PDVRF1 + $PDVRF2 + $PDVRF3 + $PDVRF4 + $PDVRM1 + $PDVRM2 + $PDVRM3 + $PDVRM4).'</td>
                    <td class="bg-danger">'.($TransfertEntrantF1 + $TransfertEntrantF2 + $TransfertEntrantF3 + $TransfertEntrantF4 + $TransfertEntrantM1 + $TransfertEntrantM2 + $TransfertEntrantM3 + $TransfertEntrantM4).'</td>
                    <td class="bg-danger">'.($TransfertSortantF1 + $TransfertSortantF2 + $TransfertSortantF3 + $TransfertSortantF4 + $TransfertSortantM1 + $TransfertSortantM2 + $TransfertSortantM3 + $TransfertSortantM4).'</td>
                    <td class="bg-danger"></td>
                    </tr>
                 ';
                    
                    echo '
                    </tbody>
                    </form>


                   </table>


              </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>http://172.16.207.74/Senegal/Senegal/tacojo/index.php?page=rapport#
';
}
?>
