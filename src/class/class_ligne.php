<?php
	
class ligne {

    private $selectAll;

    public function __CONSTRUCT($db) {
        $this->selectAll = $db->prepare("SELECT * FROM LIGNE");
    }

    public function selectAll() {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }
}
	
?>