<?php
class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    
    public function addMhsData($data)
    {
        $query = "INSERT INTO mahasiswa
            (name, nim, email, programStudy)
          VALUES
            (:name, :nim, :email, :programStudy)";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('programStudy', $data['programStudy']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteMhsData($id){
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function updateMhsData($data){
        $query = "UPDATE mahasiswa SET
                    name = :name,
                    nim = :nim,
                    email = :email,
                    programStudy = :programStudy
                    WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('programStudy', $data['programStudy']);
        $this->db->bind('id', $data['id']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    public function findMhsData(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE name LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");

        return $this->db->resultSet();
    }
}

?>