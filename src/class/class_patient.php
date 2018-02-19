<?php

    class Patient {

        private $insertAll;
        private $selectAll;
        private $selectOne;
        private $selectOne2;
        private $selectId;
        private $updateAll;
        private $updateProto;
        private $deleteOne;
        private $selectOne3;
        private $selectAge;
        
        private $getPatientByNumIDNat;

        public function __construct($db) {

            $this->insertAll = $db->prepare("INSERT INTO PATIENT(num_id_national, num_inclusion, profil_serologique, sexe, date_de_naissance,
                                            protocole, poids, ligne, co_infections, date_inclusion, inclusion) values( :num_id_national, :num_inclusion, :profil_serologique, :sexe,
                                            :date_de_naissance, :protocole, :poids, :ligne, :co_infections, :date_inclusion , :inclusion)");

            $this->selectAll=$db->prepare("select * from PATIENT ");
            
            $this->selectAll2=$db->prepare("select month(date_inclusion) as moisInscription , year(date_inclusion) as yearInscription,sexe,date_inclusion, dateInscription, id_patient,DATEDIFF(:date , date_de_naissance) as AgeEnJour from PATIENT ");

            $this->selectOne3=$db->prepare("select * from PATIENT where num_inclusion=:num_inclusion and num_id_national=:num_id_national");

            $this->selectOne2=$db->prepare("select * from PATIENT where num_id_national=:num_id_national");

            $this->selectOne=$db->prepare("select * from PATIENT where id_patient=:id_patient");

            $this->selectId=$db->prepare("select * from PATIENT where id_patient=:id_patient");
            
            $this->selectAge=$db->prepare("select DATEDIFF(CURRENT_DATE,date_de_naissance) as Age from PATIENT where id_patient=:id_patient");

            $this->updateAll=$db->prepare("update PATIENT SET num_id_national=:num_id_national,num_inclusion=:num_inclusion,
                                          profil_serologique=:profil_serologique, sexe=:sexe, date_de_naissance=:date_de_naissance, 
                                          protocole=:protocole,  poids=:poids , ligne=:ligne, co_infections=:co_infections , date_inclusion=:date_inclusion , inclusion=:inclusion WHERE id_patient=:id_patient");

            $this->updateProto=$db->prepare("update PATIENT SET protocole=:protocole WHERE id_patient=:id_patient");

            $this->deleteOne=$db->prepare("delete from PATIENT where id_patient=:id_patient");
            
        }

        public function insertAll($num_id_national, $num_inclusion, $profil_serologique, $sexe, $date_de_naissance, $protocole, $poids, $ligne, $co_infections, $date_inclusion ,$inclusion){
            $this->insertAll->execute(array(':num_id_national' => $num_id_national,':num_inclusion' => $num_inclusion,':profil_serologique' => $profil_serologique,
                    ':sexe' => $sexe,':date_de_naissance' => $date_de_naissance,':protocole' => $protocole,':poids' => $poids,':ligne' => $ligne, ':co_infections' => $co_infections, ':date_inclusion' => $date_inclusion, ':inclusion' => $inclusion));
            return $this->insertAll->rowCount();
        }

        public function selectAll() {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        }
        
        public function selectAll2($date) {
            $this->selectAll2->execute(array(':date' => $date));
            return $this->selectAll2->fetchAll();
        }
        
        public function selectOne3($num_inclusion, $num_id_national) {
            $this->selectOne3->execute(array(':num_inclusion' => $num_inclusion, ':num_id_national' => $num_id_national));
            return $this->selectOne3->fetch();
        }

        public function selectOne2($num_id_national) {
            $this->selectOne2->execute(array(':num_id_national' => $num_id_national));
            return $this->selectOne2->fetch();
        }

        public function selectOne($num_inclusion) {
            $this->selectOne->execute(array(':num_inclusion' => $num_inclusion));
            return $this->selectOne->fetch();
        }


        public function selectId($id_patient) {
            $this->selectId->execute(array(':id_patient' => $id_patient));
            return $this->selectId->fetch();
        }

        public function selectAge($id_patient) {
            $this->selectAge->execute(array(':id_patient' => $id_patient));
            return $this->selectAge->fetch();
        }
        
        public function updateAll($id_patient, $num_inclusion, $num_id_national, $profil_serologique, $sexe, $date_de_naissance, $protocole, $poids, $ligne, $co_infections, $date_inclusion , $inclusion){
            $this->updateAll->execute(array(':id_patient' => $id_patient,':num_inclusion' => $num_inclusion,':num_id_national' => $num_id_national,
                ':profil_serologique' => $profil_serologique,':sexe' => $sexe,':date_de_naissance' => $date_de_naissance,':protocole' => $protocole,
                ':poids' => $poids,':ligne' => $ligne, 'co_infections' => $co_infections, ':date_inclusion' => $date_inclusion , ':inclusion' => $inclusion));
            return $this->updateAll->rowCount();
        }


        public function updateProto($id_patient, $protocole){
            $this->updateProto->execute(array(':id_patient' => $id_patient,':protocole' => $protocole));
            return $this->updateProto->rowCount();
        }


        public function deleteOne($id_patient){
            $this->deleteOne->execute(array(':id_patient' => $id_patient));
            return $this->deleteOne->rowCount();
        }
    }
    
?>
