<?php
    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASSWORD;
        private $db_name = DB_NAME;
        private $dbh;
        private $stmt;

        public function __construct() {
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name; //data source name

            $option = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
            } catch (PDOException $e) {
                // Log the error instead of displaying it
                error_log('Database Connection Error: ' . $e->getMessage());
                // Handle the error gracefully or throw a custom exception
                throw new Exception('Database Connection Error. Please contact the administrator.');
            }
        }

        public function query($query){
            $this->stmt = $this->dbh->prepare($query);
        }

        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        public function execute(){
            $this->stmt->execute();
        }

        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        
    }
?>