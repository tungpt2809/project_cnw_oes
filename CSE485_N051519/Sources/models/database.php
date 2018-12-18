<?php
    define("DB_HOST","localhost");
    define("DB_NAME","online_examination_system");
    define("DB_USER","root");
    define("DB_PWD","");
    class Database 
    {
        protected $conn = '';
        protected $sql = '';
        protected $cursor = NULL;

        public function __construct()
        {
            try
            {
                $this->conn = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PWD);
                $this->conn->exec("set names utf8");
            } catch(PDOException $ex){
                die($ex->getMessage());
            }
        }
        public function setQuery($sql)
        {
            $this->sql = $sql;
        }

        public function execute($options=array())
        {
            $this->cursor = $this->conn->prepare($this->sql);
            if ($options) 
            {  //If have $options then system will be tranmission parameters
                for ($i = 0; $i < count($options); $i++)
                {
                    $this->cursor->bindParam($i+1, $options[$i]);
                }
            }
            $this->cursor->execute();
            return $this->cursor;
        }

        public function loadAllRows($options=array())
        {
            if (!$options) 
            {
                if (!$result = $this->execute()) 
                {
                    return false;
                }
            } else 
            {
                if (!$result = $this->execute($options)) 
                {
                    return false;
                }
            }
            return $result->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>