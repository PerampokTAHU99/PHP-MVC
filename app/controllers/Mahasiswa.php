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
}
?>