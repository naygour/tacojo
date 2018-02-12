<?php

class inclusion {

    private $insertAll;
    private $selectOne;

    public function __construct($db) {

    $this->insertAll = $db->prepare("INSERT INTO INCLUSION ( num_inclusion , date_inclusion) values(  :num_inclusion, :date_inclusion)");
    $this->selectOne=$db->prepare("select * from INCLUSION where num_inclusion=:num_inclusion");

    }

    public function insertAll($num_inclusion, $date_inclusion){
        $this->insertAll->execute(array(':num_inclusion' => $num_inclusion,':date_inclusion' => $date_inclusion));
        return $this->insertAll->rowCount();
    }

    public function selectOne($num_inclusion) {
        $this->selectOne->execute(array(':num_inclusion' => $num_inclusion));
        return $this->selectOne->fetch();
    }
}

?>
