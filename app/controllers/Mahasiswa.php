<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    } 
    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function add(){
        if ($this->model('Mahasiswa_model')->addMhsData($_POST) > 0) {
            Flasher::setFlash('Berhasil','Ditambahkan','success');
            // Redirect if the addition operation was successful
            header('Location: ' . BASEURL . '/Mahasiswa');
            exit;
        }else{
            Flasher::setFlash('Gagal','Ditambahkan','danger');
            // Redirect if the addition operation was successful
            header('Location: ' . BASEURL . '/Mahasiswa');
            exit;
        }
    }

    public function delete($id){
        if ($this->model('Mahasiswa_model')->deleteMhsData($id) > 0) {
            Flasher::setFlash('Berhasil','Dihapus','success');
            // Redirect if the addition operation was successful
            header('Location: ' . BASEURL . '/Mahasiswa');
            exit;
        }else{
            Flasher::setFlash('Gagal','Dihapus','danger');
            // Redirect if the addition operation was successful
            header('Location: ' . BASEURL . '/Mahasiswa');
            exit;
        }
    }

    public function getUpdate(){
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function update(){
        if ($this->model('Mahasiswa_model')->updateMhsData($_POST) > 0) {
            Flasher::setFlash('Berhasil','DiUpdate','success');
            // Redirect if the addition operation was successful
            header('Location: ' . BASEURL . '/Mahasiswa');
            exit;
        }else{
            Flasher::setFlash('Gagal','Diupdate','danger');
            // Redirect if the addition operation was successful
            header('Location: ' . BASEURL . '/Mahasiswa');
            exit;
        }
    }
    
    public function find(){
        $data['title'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->findMhsData();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
?>