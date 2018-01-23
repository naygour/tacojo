<?php


function Verif($parametres){

    $resultat['message']='';
		$resultat['code']=0;
		$i=0;
		while((list($key,$val)=each($parametres))&&(empty($resultat['message']))){
        if (isset($_POST[$key])){
            if ($val['null']=='no'){
                if(empty($_POST[$key])){
                    $resultat['message']='Vous devais saisir '.$val['label'].'';
}
}
			}else{ echo'la variable'.$val['label']= 'nexiste pas';}




        $i++;
		}
if (!empty($resultat['message'])){
        $resultat['code']=1;
}
return $resultat;
	}

?>