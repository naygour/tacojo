$(document).ready(function()
{
    
        
    
        /*($('#num_inclusionTEST')).focusout(function(){
            $(this).css('background-color', 'red');
            alert($('#num_inclusionTEST').val());
	});*/
        
        
        $('#btPatient').click(function(e){
            var cp=0;
            cp += verifierDate($('#date_de_naissance'));
            cp += verifier($('#num_id_national'));
            cp += verifier($('#num_inclusionTEST'));
            cp += verifierDate($('#date_inclusion'));

            if(cp!=4){
                e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi
            }
        
        });  
        
    
        $('#btValider').click(function(e){
            var cp=0;
            alert($('#date_dispensation').val());
            cp += verifierNombre($('#poids'));
            cp += verifier($('#observations'));
            cp += verifierNombre($('#nb_jours_traitement'));
            cp += verifier($('#protocole'));
            cp += verifierDate($('#pUpDate'));
            cp += verifierDate($('#date_dispensation'));
            cp += verifierDate($('#date_rdv'));
            if(cp!=7){
                e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi
            }

         });
    
        function verifier(champ){
            var cp=0;
            if(champ.val() == ""){ // si le champ est vide
                afficherErreur(true,champ);
            }
            else{
                cp=1;
                afficherErreur(false,champ);
            }
            return cp;
        
        }
        
        function verifierDate(champ){
            var cp=0;
            var date= champ.val();
            var from = date.split("-")
            var year = from[0];
            var month = from[1];
            var day = from[2];
            
            if(year.length != 4 || year<1900 || year>2019 ){
                afficherErreur(true,champ);
            }            
            else{
                cp=1;
                afficherErreur(false,champ);             
            }
            return cp;
        }
        
        function verifierNombre(champ){
            var cp=0;
            var nb = champ.val();
            if(nb == ""){ // si le champ est vide
                afficherErreur(true,champ);
            }
            else if(isNaN(nb)==false){
                cp=1;
                afficherErreur(false,champ);
            }
            else{
                afficherErreur(true,champ);
            }
            return cp;
        }
        
        function afficherErreur(valeur,champ){
            if(valeur==true){
                champ.css({ // on rend le champ rouge
    	        borderColor : 'red',
    	        color : 'red',
                //backgroundColor : 'blue'
    	    });
            }
            else{
                cp=1;
                champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
                borderColor : '#ccc',
                color : '#555',
                //backgroundColor : 'white
                
                });
            }
        }

});

