<?php

    class repartition_adulte
    {
        private $selectAll;
        private $selectAll2;

        public function __construct($db) {
            //Compte le nombre de protocole par mois par protocole par année ou le type protocole = 1
            $this->selectAll=$db->prepare("SELECT id_proto, `type_protocole`, nom_proto, count(protocole) nb_protocole, annee,
                                          mois FROM PROTOCOLE pr LEFT JOIN PATIENT pa ON pr.id_proto=pa.protocole 
                                          LEFT JOIN SUIVI_PRESENCE sp ON sp.id_patient=pa.id_patient WHERE type_protocole=1 
                                          AND (annee IS NULL or `date_de_naissance` <= '2016-12-31' - INTERVAL 18 YEAR) GROUP BY id_proto, annee, mois");
            //Compte le nombre de protocole par mois par protocole par année ou le type protocole = 2
            $this->selectAll2=$db->prepare("SELECT id_proto, `type_protocole`, nom_proto, count(protocole) nb_protocole, annee,
                                           mois FROM PROTOCOLE pr LEFT JOIN PATIENT pa ON pr.id_proto=pa.protocole LEFT JOIN 
                                           SUIVI_PRESENCE sp ON sp.id_patient=pa.id_patient WHERE type_protocole=2 
                                           AND (annee IS NULL or `date_de_naissance` <= '2016-12-31' - INTERVAL 18 YEAR) GROUP BY id_proto, annee, mois");
        }

        public function selectAll() {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }

        public function selectAll2() {
            $this->selectAll2->execute();
            return $this->selectAll2->fetchAll();
        }
    }