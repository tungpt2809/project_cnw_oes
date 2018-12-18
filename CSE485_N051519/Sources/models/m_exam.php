<?php
    include("database.php");
    class M_exam extends Database
    {
        function getAllExams()
        {
            $sql = "SELECT * FROM exam";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
    }
?>