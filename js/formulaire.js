$(document).ready(function()
{
    
        
    
        /*($('#num_inclusionTEST')).focusout(function(){
            $(this).css('background-color', 'red');
            alert($('#num_inclusionTEST').val());
	});*/
        
        
        $('#btPatient').click(function(e){
            
        e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi
        verifier($('#date_de_naissance'));
        verifier($('#num_id_national'));
        verifier($('#num_inclusionTEST'));
        verifier($('#date_inclusion'));
        
        verifierDate($('#date_de_naissance'));
        verifierDate($('#date_inclusion'));
        
        
        
    });
    
        function verifier(champ){
            if(champ.val() == ""){ // si le champ est vide
            champ.css({ // on rend le champ rouge
    	        borderColor : 'red',
    	        color : 'red'
    	    });
        }
            else{
                champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
                borderColor : '#ccc',
                color : '#555'
                });
            }
        
        }
        
        function verifierDate(champ){
            var date= champ.val();
            var from = date.split("-")
            var year = from[0];
            var month = from[1];
            var day = from[2];
            
            if(year.length != 4 ){
                champ.css({ // on rend le champ rouge
    	        borderColor : 'red',
    	        color : 'red'
                });
            }            
            else{
                champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
                borderColor : '#ccc',
                color : '#555'
                });
            }
            
        }


});

