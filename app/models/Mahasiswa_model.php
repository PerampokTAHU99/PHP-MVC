<?php
    class Mahasiswa_model{
        private $dbh,$stmt; //database handler

        public function __construct() {
            $dsn = 'mysql:host=localhost;dbname=fundamental_php'; //data source name

            try{
                $this->dbh = new PDO($dsn, 'root', '');
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }

        // private $mhs = [
        //         [
        //             "name" => "Theo Fahrizal Syam",
        //             "nim" => "5190411052",
        //             "email" => "theof@gmail.com",
        //             "prodi" => "Teknik Informatika",
        //         ],
        //         [
        //             "name" => "Djarot Subarkah",
        //             "nim" => "5190412053",
        //             "email" => "jarot@gmail.com",
        //             "prodi" => "Teknik Nuklir",
        //         ],
        //         [
        //             "name" => "Diane Mariah",
        //             "nim" => "519031123",
        //             "email" => "Diane@gmail.com",
        //             "prodi" => "Psikologi",
        //         ]
                
        //     ];
            public function getAllMahasiswa(){
                $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
                $this->stmt->execute();
                return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            }
    }

?>