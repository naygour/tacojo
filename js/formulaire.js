$(document).ready(function()
{
    
        
    
        /*($('#num_inclusionTEST')).focusout(function(){
            $(this).css('background-color', 'red');
            alert($('#num_inclusionTEST').val());
	});*/
        
        
        $('#btPatient').click(function(e){
            var cp=0;
        cp += verifier($('#date_de_naissance'));
        cp += verifier($('#num_id_national'));
        cp += verifier($('#num_inclusionTEST'));
        cp += verifier($('#date_inclusion'));
        
        cp += verifierDate($('#date_de_naissance'));
        cp += verifierDate($('#date_inclusion'));
   
        if(cp!=6){
            e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi
        }
        
    });
    
        function verifier(champ){
            var cp=0;
            if(champ.val() == ""){ // si le champ est vide
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
                //backgroundColor : 'white'
                });
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
            
            if(year.length != 4 || year<1900 || year>2019){
                champ.css({ // on rend le champ rouge
    	        borderColor : 'red',
    	        color : 'red',
                //backgroundColor : 'red'
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
            return cp;
        }


});

