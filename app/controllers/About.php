<?php
    class About extends Controller{
        public function index($name = 'Theo', $work = 'Programmer', $age = 20){
            $data ['name'] = $name;
            $data ['work'] = $work;
            $data ['age'] = $age;
            $data['title'] = 'About me Page';
            $this->view('templates/header',$data);
            $this->view('about/index',$data);
            $this->view('templates/footer');
        }
        public function page(){
            $data['title'] = 'Pages';
            $this->view('templates/header',$data);
            $this->view('about/page');
            $this->view('templates/footer');
        }
    }
?>