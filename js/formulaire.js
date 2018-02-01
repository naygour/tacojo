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
            cp += verifierNombre($('#poids'));
            cp += verifier($('#observations'));
            cp += verifierNombre($('#nb_jours_traitement'));
            cp += verifier($('#protocole'));
            cp += verifierDate($('#pUpDate'));
            cp += verifierDate($('#date_dispensation'));
            cp += verifierDate($('#date_rdv'));
            cp += verifierJourFerie($('#date_rdv'));
            cp += comparerDate($('#date_rdv') , $('#date_fin_traitement'));
            if(cp!=9){
                e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi
            }

         });
    
       function verifier(champ){
            var cp=0;
            if(champ.val() == ""){ // si le champ est vide
                afficherErreur(true,champ); // Fonction qui va afficher l'erreur
            }
            else{
                cp=1;
                afficherErreur(false,champ); // Fonction qui va remet le formulaire basique s'il n'y a pas erreur
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
        
        function verifierJourFerie(champ){
            var cp=1;
            var dateDepart= champ.val(); 
            var from = dateDepart.split("-")
            var year = from[0];
            var month = from[1];
            var day = from[2];
            var date = new Date(year,month,day);
            
            var jour= date.getDay();
            var jourFerie= [year+"-01-01" , year+"-05-01",year+"-05-08",year+"-07-14",year+"-08-15",year+"-11-01",year+"-11-11",year+"-12-25"]
            
            if(jour==2 || jour==3){
                cp=0;
                afficherErreur(true,champ);
            }
            else{
                for(var i=0 ; i<jourFerie.length; i++){
                    if(dateDepart==jourFerie[i]){
                        cp=0;
                        afficherErreur(true,champ);
                    }
                }
            }
            return cp;
        }
        
            function comparerDate(dateA1 , dateA2 ){
            var cp=0;
            var date1 = dateA1.val();
            var date2 = dateA2.val();
            var from1 = date1.split("-") , from2 = date2.split("-") ;
            var year1 = from1[0] , year2 = from2[0]
            var month1 = from1[1] , month2 = from2[1]
            var day1 = from1[2] , day2 = from2[2]

            date1 = new Date(year1 , month1 , day1);
            date2 = new Date(year2 , month2 , day2);

            if(date1 > date2 ){
                afficherErreur(true,dateA1);
            }
            else {
                cp=1;
                afficherErreur(false,dateA1);
            }
            return cp;
        }
});

